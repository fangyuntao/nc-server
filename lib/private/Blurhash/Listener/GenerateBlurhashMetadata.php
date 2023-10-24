<?php

declare(strict_types=1);

namespace OC\Blurhash\Listener;

use GdImage;
use kornrunner\Blurhash\Blurhash;
use OC\Files\Node\File;
use OCP\EventDispatcher\Event;
use OCP\EventDispatcher\IEventDispatcher;
use OCP\EventDispatcher\IEventListener;
use OCP\FilesMetadata\Event\MetadataBackgroundEvent;
use OCP\FilesMetadata\Event\MetadataLiveEvent;

class GenerateBlurhashMetadata implements IEventListener {
	private const RESIZE_BOXSIZE = 300;

	private const COMPONENTS_X = 4;
	private const COMPONENTS_Y = 3;

	public function __construct() {
	}

	public function handle(Event $event): void {
		if (!($event instanceof MetadataLiveEvent)
			&& !($event instanceof MetadataBackgroundEvent)) {
			return;
		}

		$file = $event->getNode();
		if (!($file instanceof File) || !str_starts_with($file->getMimetype(), 'image/')) {
			return;
		}

		if ($event instanceof MetadataLiveEvent) {
			$event->requestBackgroundJob();

			return;
		}

		$image = $this->resizedImageFromFile($file);
		$metadata = $event->getMetadata();
		$metadata->set('blurhash', $this->generateBlurHash($image));
	}

	private function resizedImageFromFile(File $file): GdImage {
		$image = imagecreatefromstring($file->getContent());
		$currX = imagesx($image);
		$currY = imagesy($image);

		if ($currX > $currY) {
			$newX = self::RESIZE_BOXSIZE;
			$newY = intval($currY * $newX / $currX);
		} else {
			$newY = self::RESIZE_BOXSIZE;
			$newX = intval($currX * $newY / $currY);
		}

		$newImage = imagescale($image, $newX, $newY);
		if (false !== $newImage) {
			$image = $newImage;
		}

		return $image;
	}

	public function generateBlurHash(GdImage $image): string {
		$width = imagesx($image);
		$height = imagesy($image);

		$pixels = [];
		for ($y = 0; $y < $height; ++$y) {
			$row = [];
			for ($x = 0; $x < $width; ++$x) {
				$index = imagecolorat($image, $x, $y);
				$colors = imagecolorsforindex($image, $index);
				$row[] = [$colors['red'], $colors['green'], $colors['blue']];
			}

			$pixels[] = $row;
		}

		return Blurhash::encode($pixels, self::COMPONENTS_X, self::COMPONENTS_Y);
	}

	/**
	 * @param IEventDispatcher $eventDispatcher
	 *
	 * @return void
	 */
	public static function loadListeners(IEventDispatcher $eventDispatcher): void {
		$eventDispatcher->addServiceListener(MetadataLiveEvent::class, self::class);
		$eventDispatcher->addServiceListener(MetadataBackgroundEvent::class, self::class);
	}
}
