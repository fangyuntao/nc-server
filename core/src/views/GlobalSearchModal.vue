<template>
	<NcModal v-if="isVisible"
		id="global-search"
		:name="t('core', 'Global search')"
		:show.sync="isVisible"
		:clear-view-delay="0"
		:title="t('Global search')"
		@close="closeModal">
		<CustomDateRangeModal :is-open="showDateRangeModal"
			:class="'global-search__date-range'"
			@set:custom-date-range="setCustomDateRange"
			@update:is-open="showDateRangeModal = $event" />
		<!-- Global search form -->
		<div ref="globalSearch" class="global-search-modal">
			<h1>{{ t('core', 'Global search') }}</h1>
			<NcInputField :value.sync="searchQuery"
				type="text"
				:label="t('core', 'Search apps, files, tags, messages...')"
				@update:value="debouncedFind" />
			<div class="global-search-modal__filters">
				<NcActions :menu-name="t('core', 'Apps and Settings')" :open.sync="providerActionMenuIsOpen">
					<template #icon>
						<ArrowDown :size="20" />
					</template>
					<NcActionButton v-for="provider in providers" :key="provider.id" @click="addProviderFilter(provider)">
						<template #icon>
							<img :src="provider.icon">
						</template>
						{{ t('core', provider.name) }}
					</NcActionButton>
				</NcActions>
				<NcActions :menu-name="t('core', 'Modified')" :open.sync="dateActionMenuIsOpen">
					<template #icon>
						<CalendarRangeIcon :size="20" />
					</template>
					<NcActionButton @click="applyQuickDateRange('today')">
						{{ t('core', 'Today') }}
					</NcActionButton>
					<NcActionButton @click="applyQuickDateRange('7days')">
						{{ t('core', 'Last 7 days') }}
					</NcActionButton>
					<NcActionButton @click="applyQuickDateRange('30days')">
						{{ t('core', 'Last 30 days') }}
					</NcActionButton>
					<NcActionButton @click="applyQuickDateRange('thisyear')">
						{{ t('core', 'This year') }}
					</NcActionButton>
					<NcActionButton @click="applyQuickDateRange('lastyear')">
						{{ t('core', 'Last year') }}
					</NcActionButton>
					<NcActionButton @click="applyQuickDateRange('custom')">
						{{ t('core', 'Custom date range') }}
					</NcActionButton>
				</NcActions>
				<NcSelect v-bind="peopleSeclectProps" v-model="peopleSeclectProps.value" />
			</div>
			<div class="global-search-modal__filters-applied">
				<FilterChip v-for="filter in filters"
					:key="filter.id"
					:text="filter.name ?? filter.text"
					:pretext="''"
					@delete="removeFilter(filter)">
					<template #icon>
						<AccountIcon v-if="filter.type === 'person'" />
						<CalendarRangeIcon v-else-if="filter.type === 'date'" />
						<img v-else :src="filter.icon" alt="">
					</template>
				</FilterChip>
			</div>
			<div v-if="searchQuery.length === 0">
				<NcEmptyContent :name="t('core', 'Start typing in search')">
					<template #icon>
						<MagnifyIcon />
					</template>
				</NcEmptyContent>
			</div>
			<div v-for="providerResult in results" :key="providerResult.id" class="global-search-modal__results">
				<div class="result">
					<div class="result-title">
						<span>{{ providerResult.provider }}</span>
					</div>
					<ul class="result-items">
						<NcListItem v-for="(result, index) in providerResult.results"
							:key="index"
							:name="result.title"
							:bold="false">
							<template #icon>
								<img :src="result.thumbnailUrl">
								<!-- <NcAvatar :size="44" user="janedoe" display-name="Jane Doe" /> -->
								<!-- <FolderIcon v-if="providerResult.provider === 'Files'" :size="40" /> -->
								<!-- <AccountIcon v-else :size="40" /> -->
							</template>
							<template #subname>
								{{ result.subline }}
							</template>ddd
						</NcListItem>
					</ul>
					<div class="result-footer">
						<NcButton type="tertiary-no-background">
							Load more results
							<template #icon>
								<DotsHorizontalIcon :size="20" />
							</template>
						</NcButton>
						<NcButton alignment="end-reverse" type="tertiary-no-background">
							Search in {{ providerResult.provider }}
							<template #icon>
								<ArrowRight :size="20" />
							</template>
						</NcButton>
					</div>
				</div>
			</div>
		</div>
	</NcModal>
</template>

<script>
import ArrowRight from 'vue-material-design-icons/ArrowRight.vue'
import ArrowDown from 'vue-material-design-icons/ArrowDown.vue'
import AccountIcon from 'vue-material-design-icons/AccountCircle.vue'
import CalendarRangeIcon from 'vue-material-design-icons/CalendarRange.vue'
import CustomDateRangeModal from '../components/GlobalSearch/CustomDateRangeModal.vue'
import DotsHorizontalIcon from 'vue-material-design-icons/DotsHorizontal.vue'
import FilterChip from '../components/GlobalSearch/SearchFilterChip.vue'
import NcActions from '@nextcloud/vue/dist/Components/NcActions.js'
import NcActionButton from '@nextcloud/vue/dist/Components/NcActionButton.js'
import NcButton from '@nextcloud/vue/dist/Components/NcButton.js'
import NcEmptyContent from '@nextcloud/vue/dist/Components/NcEmptyContent.js'
import NcInputField from '@nextcloud/vue/dist/Components/NcInputField.js'
import NcModal from '@nextcloud/vue/dist/Components/NcModal.js'
import NcListItem from '@nextcloud/vue/dist/Components/NcListItem.js'
import NcSelect from '@nextcloud/vue/dist/Components/NcSelect.js'
import MagnifyIcon from 'vue-material-design-icons/Magnify.vue'

import debounce from 'debounce'
import { getProviders, search as globalSearch } from '../services/GlobalSearchService.js'

export default {
	name: 'GlobalSearchModal',
	components: {
		AccountIcon,
		ArrowRight,
		ArrowDown,
		CalendarRangeIcon,
		CustomDateRangeModal,
		DotsHorizontalIcon,
		FilterChip,
		NcActions,
		NcActionButton,
		NcButton,
		NcEmptyContent,
		NcModal,
		NcListItem,
		NcSelect,
		NcInputField,
		MagnifyIcon,
	},
	props: {
		isVisible: {
			type: Boolean,
			required: true,
		},
	},
	data() {
		return {
			providers: [],
			providerActionMenuIsOpen: false,
			dateActionMenuIsOpen: false,
			dateFilter: { id: 'date', type: 'date', text: '', startFrom: null, endAt: null },
			filteredProviders: [],
			searchQuery: '',
			placesFilter: '',
			dateTimeFilter: null,
			filters: [],
			results: [],
			debouncedFind: debounce(this.find, 300),
			showDateRangeModal: false,
		}
	},

	computed: {
		peopleSeclectProps: {
			get() {
				return {
					// inputId: getRandomId(),
					name: 'People',
					userSelect: true,
					placement: 'top',
					options: this.getUsers(),
				}
			},

		},

	},
	mounted() {
		getProviders().then((providers) => {
			this.providers = providers
			console.debug('Search providers', this.providers)
		})
	},
	methods: {
		find(query) {
			if (query.length) {
				const newResults = []
				let activeSearchProviders = []
				if (this.filteredProviders.length > 0) {
					activeSearchProviders = this.filteredProviders
				} else {
					activeSearchProviders = this.providers
				}
				activeSearchProviders.forEach(provider => {
					console.debug('Search type', provider.id)
					const request = globalSearch({ type: provider.id, query, cursor: null }).request
					request().then((response) => {
						newResults.push({ id: provider.id, provider: provider.name, results: response.data.ocs.data.entries })
						console.debug('New results', newResults)
						console.debug('Global search results:', newResults)
						this.updateResults(newResults)
					})
				})
			} else {
				this.results = []
			}
		},
		updateResults(newResults) {
			newResults.forEach(newResult => {
				const existingResultIndex = this.results.findIndex(result => result.id === newResult.id)
				if (existingResultIndex !== -1) {
					// If the result with the same ID exists, check the new results array
					if (newResult.results.length === 0) {
						// If the new results array is empty, remove the existing result
						this.results.splice(existingResultIndex, 1)
					} else {
						// Otherwise, replace the existing result with the new result
						this.results.splice(existingResultIndex, 1, newResult)
					}
				} else if (newResult.results.length > 0) {
					// If not, push the new result to the array only if its results array is not empty
					this.results.push(newResult)
				}
			})
			// If filters are applied, remove any previous results for providers that are not in current filters
			this.results.forEach((result, index) => {
				if (this.filters.length > 0) {
					// If existing result provider is not found in selected filters remove existing result
					const staleFilterIndex = this.filters.findIndex(filter => filter.id === result.id)
					if (staleFilterIndex === -1) {
						this.results.splice(index, 1)
					}
				}

			})
		},
		closeModal() {
			// close operations like clean search?
		},
		addProviderFilter(providerFilter) {
			if (!providerFilter.id) return
			this.providerActionMenuIsOpen = false
			const existingFilter = this.filteredProviders.find(existing => existing.id === providerFilter.id)
			if (!existingFilter) {
				this.filteredProviders.push({ id: providerFilter.id, name: providerFilter.name, icon: providerFilter.icon, type: 'provider' })
			}
			this.filters = this.syncProviderFilters(this.filters, this.filteredProviders)
			console.debug('Search filters (newly added)', this.filters)
			this.debouncedFind(this.searchQuery)
		},
		removeFilter(filter) {
			if (filter.type === 'provider') {
				for (let i = 0; i < this.filteredProviders.length; i++) {
					if (this.filteredProviders[i].id === filter.id) {
						this.filteredProviders.splice(i, 1)
						break
					}
				}
				this.filters = this.syncProviderFilters(this.filters, this.filteredProviders)
				console.debug('Search filters (recently removed)', this.filters)

			} else {
				for (let i = 0; i < this.filters.length; i++) {
					if (this.filters[i].id === 'date') {
						this.filters.splice(i, 1)
						break
					}
				}
			}
			this.debouncedFind(this.searchQuery)
		},
		syncProviderFilters(firstArray, secondArray) {
			// Create a copy of the first array to avoid modifying it directly.
			const synchronizedArray = firstArray.slice()
			// Remove items from the synchronizedArray that are not in the secondArray.
			synchronizedArray.forEach((item, index) => {
				const itemId = item.id
				if (item.type === 'provider') {
					if (!secondArray.some(secondItem => secondItem.id === itemId)) {
						synchronizedArray.splice(index, 1)
					}
				}
			})
			// Add items to the synchronizedArray that are in the secondArray but not in the firstArray.
			secondArray.forEach(secondItem => {
				const itemId = secondItem.id
				if (secondItem.type === 'provider') {
					if (!synchronizedArray.some(item => item.id === itemId)) {
						synchronizedArray.push(secondItem)
					}
				}
			})

			return synchronizedArray
		},
		updateDateFilter() {
			const currFilterIndex = this.filters.findIndex(filter => filter.id === 'date')
			if (currFilterIndex !== -1) {
				this.filters[currFilterIndex] = this.dateFilter
			} else {
				this.filters.push(this.dateFilter)
			}
			this.debouncedFind(this.searchQuery)
		},
		applyQuickDateRange(range) {
			this.dateActionMenuIsOpen = false
			const today = new Date()
			let endDate = today
			let startDate
			switch (range) {
			case 'today':
				// For 'Today', both start and end are set to today
				startDate = today
				this.dateFilter.text = t('core', 'Modified today')
				break
			case '7days':
				// For 'Last 7 days', start date is 7 days ago, end is today
				startDate = new Date(today)
				startDate.setDate(today.getDate() - 7)
				this.dateFilter.text = t('core', 'Modified this week')
				break
			case '30days':
				// For 'Last 30 days', start date is 30 days ago, end is today
				startDate = new Date(today)
				startDate.setDate(today.getDate() - 30)
				this.dateFilter.text = t('core', 'Modified this month')
				break
			case 'thisyear':
				// For 'This year', start date is the first day of the year, end is today
				startDate = new Date(today.getFullYear(), 0, 1)
				this.dateFilter.text = t('core', 'Modified this year')
				break
			case 'lastyear':
				// For 'Last year', start date is the first day of the previous year, end is the last day of the previous year
				startDate = new Date(today.getFullYear() - 1, 0, 1)
				endDate = new Date(today.getFullYear() - 1, 11, 31)
				this.dateFilter.text = t('core', 'Modified last year')
				break
			case 'custom':
				this.showDateRangeModal = true
				return
			default:
				return

			}
			this.dateFilter.startFrom = startDate
			this.dateFilter.endAt = endDate
			this.updateDateFilter()

		},
		setCustomDateRange(event) {
			console.debug('Custom date range', event)
			this.dateFilter.startFrom = event.startFrom.toLocaleDateString()
			this.dateFilter.endAt = event.endAt.toLocaleDateString()
			this.dateFilter.text = t('core', `Modified between ${this.dateFilter.startFrom} and ${this.dateFilter.endAt}`)
			this.updateDateFilter()
		},
		getUsers() {
			return [
				'Peterson Kim',
				'Jonatam Mbongham',
				'Jonh kunerwater',
				'Bandolo Ambe',
				'Nformi Shey',
			]
		},
	},
}
</script>

<style lang="scss" scoped>
.global-search-modal {
	padding: 10px 20px 10px 20px;
	height: 60%;

	h1 {
		font-size: 16px;
		font-weight: bolder;
		line-height: 2em;
	}

	&__filters {
		display: flex;
		padding-top: 5px;
		align-items: center;
		justify-content: space-between;

		/* Overwrite NcSelect styles */
		::v-deep div.v-select {
			min-width: 0; // reset NcSelect min width

			div.vs__dropdown-toggle {
				height: 44px; // Overwrite height of NcSelect component to match button
			}
		}

		::v-deep>* {
			min-width: auto;
			/* Reset hard set min widths */
			min-height: 0;
			/* Reset any min heights */
			display: flex;
			align-items: center;
			flex: 1;

			>* {
				flex: 1;
				min-width: auto;
				/* Reset hard set min widths */
				min-height: 0;
			}

		}

		::v-deep>*:not(:last-child) {
			margin: 0 2px;
		}
	}

	&__filters-applied {
		display: flex;
		flex-wrap: wrap;
	}

	&__results {
		padding: 10px;

		.result {

			.result-title {
				span {
					color: var(--color-primary-element);
					font-weight: bolder;
					font-size: 16px;
				}
			}

			.result-footer {
				justify-content: space-between;
				align-items: center;
				display: flex;
			}
		}

	}
}

div.v-popper__wrapper {
	ul {
		li {
			::v-deep button.action-button {
				align-items: center !important;

				img {
					width: 24px;
					margin: 0 4px;
					background-color: var(--color-primary-element);
					border-radius: 5px;
				}
			}
		}
	}
}
</style>
