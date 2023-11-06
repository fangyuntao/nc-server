/*! For license information please see files-reference-files.js.LICENSE.txt */
!function(){"use strict";var e,n,r,i={94032:function(e,n,r){var i=r(20144),o=r(31352),a=(r(41604),r(65374)),c=r(79753),l=r(62520),s=r.n(l),u=r(25108),d={name:"ReferenceFileWidget",props:{richObject:{type:Object,required:!0},accessible:{type:Boolean,default:!0}},data:function(){return{previewUrl:window.OC.MimeType.getIconUrl(this.richObject.mimetype)}},computed:{fileSize:function(){return window.OC.Util.humanFileSize(this.richObject.size)},fileMtime:function(){return window.OC.Util.relativeModifiedDate(1e3*this.richObject.mtime)},filePath:function(){return s().dirname(this.richObject.path)},filePreview:function(){return this.previewUrl?{backgroundImage:"url("+this.previewUrl+")"}:{backgroundImage:"url("+window.OC.MimeType.getIconUrl(this.richObject.mimetype)+")"}},filePreviewClass:function(){return this.previewUrl?"widget-file--image--preview":"widget-file--image--icon"}},mounted:function(){var t=this;if(this.richObject["preview-available"]){var e=(0,c.generateUrl)("/core/preview?fileId={fileId}&x=250&y=250",{fileId:this.richObject.id}),n=new Image;n.onload=function(){t.previewUrl=e},n.onerror=function(t){u.error("could not load recommendation preview",t)},n.src=e}},methods:{navigate:function(){OCA.Viewer&&-1!==OCA.Viewer.mimetypes.indexOf(this.richObject.mimetype)?OCA.Viewer.open({path:this.richObject.path}):window.location=this.richObject.link}}},f=r(93379),p=r.n(f),h=r(7795),g=r.n(h),A=r(90569),m=r.n(A),v=r(3565),w=r.n(v),y=r(19216),x=r.n(y),C=r(44589),b=r.n(C),j=r(7574),k={};k.styleTagTransform=b(),k.setAttributes=w(),k.insert=m().bind(null,"head"),k.domAPI=g(),k.insertStyleElement=x(),p()(j.Z,k),j.Z&&j.Z.locals&&j.Z.locals;var I=r(51900),L=(0,I.Z)(d,(function(){var t=this,e=t._self._c;return t.accessible?e("a",{staticClass:"widget-file",attrs:{href:t.richObject.link},on:{click:function(e){return e.preventDefault(),t.navigate.apply(null,arguments)}}},[e("div",{staticClass:"widget-file--image",class:t.filePreviewClass,style:t.filePreview}),t._v(" "),e("div",{staticClass:"widget-file--details"},[e("p",{staticClass:"widget-file--title"},[t._v(t._s(t.richObject.name))]),t._v(" "),e("p",{staticClass:"widget-file--description"},[t._v(t._s(t.fileSize)),e("br"),t._v(t._s(t.fileMtime))]),t._v(" "),e("p",{staticClass:"widget-file--link"},[t._v(t._s(t.filePath))])])]):e("div",{staticClass:"widget-file widget-file--no-access"},[e("div",{staticClass:"widget-file--image widget-file--image--icon icon-folder"}),t._v(" "),e("div",{staticClass:"widget-file--details"},[e("p",{staticClass:"widget-file--title"},[t._v("\n\t\t\t"+t._s(t.t("files","File cannot be accessed"))+"\n\t\t")]),t._v(" "),e("p",{staticClass:"widget-file--description"},[t._v("\n\t\t\t"+t._s(t.t("files","You might not have have permissions to view it, ask the sender to share it"))+"\n\t\t")])])])}),[],!1,null,"3f729da0",null),O=L.exports,M=r(64024);function Z(t){return Z="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},Z(t)}function S(){S=function(){return t};var t={},e=Object.prototype,n=e.hasOwnProperty,r=Object.defineProperty||function(t,e,n){t[e]=n.value},i="function"==typeof Symbol?Symbol:{},o=i.iterator||"@@iterator",a=i.asyncIterator||"@@asyncIterator",c=i.toStringTag||"@@toStringTag";function l(t,e,n){return Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}),t[e]}try{l({},"")}catch(t){l=function(t,e,n){return t[e]=n}}function s(t,e,n,i){var o=e&&e.prototype instanceof f?e:f,a=Object.create(o.prototype),c=new k(i||[]);return r(a,"_invoke",{value:x(t,n,c)}),a}function u(t,e,n){try{return{type:"normal",arg:t.call(e,n)}}catch(t){return{type:"throw",arg:t}}}t.wrap=s;var d={};function f(){}function p(){}function h(){}var g={};l(g,o,(function(){return this}));var A=Object.getPrototypeOf,m=A&&A(A(I([])));m&&m!==e&&n.call(m,o)&&(g=m);var v=h.prototype=f.prototype=Object.create(g);function w(t){["next","throw","return"].forEach((function(e){l(t,e,(function(t){return this._invoke(e,t)}))}))}function y(t,e){function i(r,o,a,c){var l=u(t[r],t,o);if("throw"!==l.type){var s=l.arg,d=s.value;return d&&"object"==Z(d)&&n.call(d,"__await")?e.resolve(d.__await).then((function(t){i("next",t,a,c)}),(function(t){i("throw",t,a,c)})):e.resolve(d).then((function(t){s.value=t,a(s)}),(function(t){return i("throw",t,a,c)}))}c(l.arg)}var o;r(this,"_invoke",{value:function(t,n){function r(){return new e((function(e,r){i(t,n,e,r)}))}return o=o?o.then(r,r):r()}})}function x(t,e,n){var r="suspendedStart";return function(i,o){if("executing"===r)throw new Error("Generator is already running");if("completed"===r){if("throw"===i)throw o;return{value:void 0,done:!0}}for(n.method=i,n.arg=o;;){var a=n.delegate;if(a){var c=C(a,n);if(c){if(c===d)continue;return c}}if("next"===n.method)n.sent=n._sent=n.arg;else if("throw"===n.method){if("suspendedStart"===r)throw r="completed",n.arg;n.dispatchException(n.arg)}else"return"===n.method&&n.abrupt("return",n.arg);r="executing";var l=u(t,e,n);if("normal"===l.type){if(r=n.done?"completed":"suspendedYield",l.arg===d)continue;return{value:l.arg,done:n.done}}"throw"===l.type&&(r="completed",n.method="throw",n.arg=l.arg)}}}function C(t,e){var n=e.method,r=t.iterator[n];if(void 0===r)return e.delegate=null,"throw"===n&&t.iterator.return&&(e.method="return",e.arg=void 0,C(t,e),"throw"===e.method)||"return"!==n&&(e.method="throw",e.arg=new TypeError("The iterator does not provide a '"+n+"' method")),d;var i=u(r,t.iterator,e.arg);if("throw"===i.type)return e.method="throw",e.arg=i.arg,e.delegate=null,d;var o=i.arg;return o?o.done?(e[t.resultName]=o.value,e.next=t.nextLoc,"return"!==e.method&&(e.method="next",e.arg=void 0),e.delegate=null,d):o:(e.method="throw",e.arg=new TypeError("iterator result is not an object"),e.delegate=null,d)}function b(t){var e={tryLoc:t[0]};1 in t&&(e.catchLoc=t[1]),2 in t&&(e.finallyLoc=t[2],e.afterLoc=t[3]),this.tryEntries.push(e)}function j(t){var e=t.completion||{};e.type="normal",delete e.arg,t.completion=e}function k(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(b,this),this.reset(!0)}function I(t){if(t){var e=t[o];if(e)return e.call(t);if("function"==typeof t.next)return t;if(!isNaN(t.length)){var r=-1,i=function e(){for(;++r<t.length;)if(n.call(t,r))return e.value=t[r],e.done=!1,e;return e.value=void 0,e.done=!0,e};return i.next=i}}return{next:L}}function L(){return{value:void 0,done:!0}}return p.prototype=h,r(v,"constructor",{value:h,configurable:!0}),r(h,"constructor",{value:p,configurable:!0}),p.displayName=l(h,c,"GeneratorFunction"),t.isGeneratorFunction=function(t){var e="function"==typeof t&&t.constructor;return!!e&&(e===p||"GeneratorFunction"===(e.displayName||e.name))},t.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,h):(t.__proto__=h,l(t,c,"GeneratorFunction")),t.prototype=Object.create(v),t},t.awrap=function(t){return{__await:t}},w(y.prototype),l(y.prototype,a,(function(){return this})),t.AsyncIterator=y,t.async=function(e,n,r,i,o){void 0===o&&(o=Promise);var a=new y(s(e,n,r,i),o);return t.isGeneratorFunction(n)?a:a.next().then((function(t){return t.done?t.value:a.next()}))},w(v),l(v,c,"Generator"),l(v,o,(function(){return this})),l(v,"toString",(function(){return"[object Generator]"})),t.keys=function(t){var e=Object(t),n=[];for(var r in e)n.push(r);return n.reverse(),function t(){for(;n.length;){var r=n.pop();if(r in e)return t.value=r,t.done=!1,t}return t.done=!0,t}},t.values=I,k.prototype={constructor:k,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=void 0,this.done=!1,this.delegate=null,this.method="next",this.arg=void 0,this.tryEntries.forEach(j),!t)for(var e in this)"t"===e.charAt(0)&&n.call(this,e)&&!isNaN(+e.slice(1))&&(this[e]=void 0)},stop:function(){this.done=!0;var t=this.tryEntries[0].completion;if("throw"===t.type)throw t.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var e=this;function r(n,r){return a.type="throw",a.arg=t,e.next=n,r&&(e.method="next",e.arg=void 0),!!r}for(var i=this.tryEntries.length-1;i>=0;--i){var o=this.tryEntries[i],a=o.completion;if("root"===o.tryLoc)return r("end");if(o.tryLoc<=this.prev){var c=n.call(o,"catchLoc"),l=n.call(o,"finallyLoc");if(c&&l){if(this.prev<o.catchLoc)return r(o.catchLoc,!0);if(this.prev<o.finallyLoc)return r(o.finallyLoc)}else if(c){if(this.prev<o.catchLoc)return r(o.catchLoc,!0)}else{if(!l)throw new Error("try statement without catch or finally");if(this.prev<o.finallyLoc)return r(o.finallyLoc)}}}},abrupt:function(t,e){for(var r=this.tryEntries.length-1;r>=0;--r){var i=this.tryEntries[r];if(i.tryLoc<=this.prev&&n.call(i,"finallyLoc")&&this.prev<i.finallyLoc){var o=i;break}}o&&("break"===t||"continue"===t)&&o.tryLoc<=e&&e<=o.finallyLoc&&(o=null);var a=o?o.completion:{};return a.type=t,a.arg=e,o?(this.method="next",this.next=o.finallyLoc,d):this.complete(a)},complete:function(t,e){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&e&&(this.next=e),d},finish:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var n=this.tryEntries[e];if(n.finallyLoc===t)return this.complete(n.completion,n.afterLoc),j(n),d}},catch:function(t){for(var e=this.tryEntries.length-1;e>=0;--e){var n=this.tryEntries[e];if(n.tryLoc===t){var r=n.completion;if("throw"===r.type){var i=r.arg;j(n)}return i}}throw new Error("illegal catch attempt")},delegateYield:function(t,e,n){return this.delegate={iterator:I(t),resultName:e,nextLoc:n},"next"===this.method&&(this.arg=void 0),d}},t}function E(t,e,n,r,i,o,a){try{var c=t[o](a),l=c.value}catch(t){return void n(t)}c.done?e(l):Promise.resolve(l).then(r,i)}var N={name:"FileReferencePickerElement",components:{},props:{providerId:{type:String,required:!0},accessible:{type:Boolean,default:!1}},mounted:function(){this.openFilePicker(),window.addEventListener("click",this.onWindowClick)},beforeDestroy:function(){window.removeEventListener("click",this.onWindowClick)},methods:{onWindowClick:function(t){"A"===t.target.tagName&&t.target.classList.contains("oc-dialog-close")&&this.$emit("cancel")},openFilePicker:function(){var e,n=this;return(e=S().mark((function e(){return S().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:OC.dialogs.filepicker(t("files","Select file or folder to link to"),(function(t){OC.Files.getClient().getFileInfo(t).then((function(t,e){n.submit(e.id)}))}),!1,[],!1,M.K9.Choose,"",{target:n.$refs.picker});case 1:case"end":return e.stop()}}),e)})),function(){var t=this,n=arguments;return new Promise((function(r,i){var o=e.apply(t,n);function a(t){E(o,r,i,a,c,"next",t)}function c(t){E(o,r,i,a,c,"throw",t)}a(void 0)}))})()},submit:function(t){var e=window.location.protocol+"//"+window.location.host+(0,c.generateUrl)("/f/{fileId}",{fileId:t});this.$emit("submit",e)}}},B=N,_=r(24056),D={};D.styleTagTransform=b(),D.setAttributes=w(),D.insert=m().bind(null,"head"),D.domAPI=g(),D.insertStyleElement=x(),p()(_.Z,D),_.Z&&_.Z.locals&&_.Z.locals;var T=(0,I.Z)(B,(function(){return(0,this._self._c)("div",{ref:"picker",staticClass:"reference-file-picker"})}),[],!1,null,"2dd87592",null).exports;i.default.mixin({methods:{t:o.Iu}}),(0,a.r)("file",(function(t,e){var n=e.richObjectType,r=e.richObject,o=e.accessible;new(i.default.extend(O))({propsData:{richObjectType:n,richObject:r,accessible:o}}).$mount(t)})),(0,a.f)("files",(function(t,e){var n=e.providerId,r=e.accessible,o=new(i.default.extend(T))({propsData:{providerId:n,accessible:r}}).$mount(t);return new a.e(o.$el,o)}),(function(t,e){e.object.$destroy()}))},24056:function(t,e,n){var r=n(87537),i=n.n(r),o=n(23645),a=n.n(o)()(i());a.push([t.id,".reference-file-picker[data-v-2dd87592]{flex-grow:1;padding:12px 16px 16px 16px}.reference-file-picker[data-v-2dd87592] .oc-dialog{transform:none !important;box-shadow:none !important;flex-grow:1 !important;position:static !important;width:100% !important;height:auto !important;padding:0 !important;max-width:initial}.reference-file-picker[data-v-2dd87592] .oc-dialog .oc-dialog-close{display:none}.reference-file-picker[data-v-2dd87592] .oc-dialog .oc-dialog-buttonrow.onebutton.aside{position:absolute;padding:12px 32px}.reference-file-picker[data-v-2dd87592] .oc-dialog .oc-dialog-content{max-width:100% !important}","",{version:3,sources:["webpack://./apps/files/src/views/FileReferencePickerElement.vue"],names:[],mappings:"AACA,wCACC,WAAA,CACA,2BAAA,CAEA,mDACC,yBAAA,CACA,0BAAA,CACA,sBAAA,CACA,0BAAA,CACA,qBAAA,CACA,sBAAA,CACA,oBAAA,CACA,iBAAA,CAEA,oEACC,YAAA,CAGD,wFACC,iBAAA,CACA,iBAAA,CAGD,sEACC,yBAAA",sourcesContent:["\n.reference-file-picker {\n\tflex-grow: 1;\n\tpadding: 12px 16px 16px 16px;\n\n\t&:deep(.oc-dialog) {\n\t\ttransform: none !important;\n\t\tbox-shadow: none !important;\n\t\tflex-grow: 1 !important;\n\t\tposition: static !important;\n\t\twidth: 100% !important;\n\t\theight: auto !important;\n\t\tpadding: 0 !important;\n\t\tmax-width: initial;\n\n\t\t.oc-dialog-close {\n\t\t\tdisplay: none;\n\t\t}\n\n\t\t.oc-dialog-buttonrow.onebutton.aside {\n\t\t\tposition: absolute;\n\t\t\tpadding: 12px 32px;\n\t\t}\n\n\t\t.oc-dialog-content {\n\t\t\tmax-width: 100% !important;\n\t\t}\n\t}\n}\n"],sourceRoot:""}]),e.Z=a},7574:function(t,e,n){var r=n(87537),i=n.n(r),o=n(23645),a=n.n(o)()(i());a.push([t.id,".widget-file[data-v-3f729da0]{display:flex;flex-grow:1;color:var(--color-main-text) !important;text-decoration:none !important}.widget-file--image[data-v-3f729da0]{min-width:40%;background-position:center;background-size:cover;background-repeat:no-repeat}.widget-file--image.widget-file--image--icon[data-v-3f729da0]{min-width:88px;background-size:44px}.widget-file--title[data-v-3f729da0]{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-weight:bold}.widget-file--details[data-v-3f729da0]{padding:12px;flex-grow:1;display:flex;flex-direction:column}.widget-file--details p[data-v-3f729da0]{margin:0;padding:0}.widget-file--description[data-v-3f729da0]{overflow:hidden;text-overflow:ellipsis;display:-webkit-box;-webkit-line-clamp:3;line-clamp:3;-webkit-box-orient:vertical}.widget-file--link[data-v-3f729da0]{color:var(--color-text-maxcontrast)}.widget-file.widget-file--no-access[data-v-3f729da0]{padding:12px}.widget-file.widget-file--no-access .widget-file--details[data-v-3f729da0]{padding:0}","",{version:3,sources:["webpack://./apps/files/src/views/ReferenceFileWidget.vue"],names:[],mappings:"AACA,8BACC,YAAA,CACA,WAAA,CACA,uCAAA,CACA,+BAAA,CAEA,qCACC,aAAA,CACA,0BAAA,CACA,qBAAA,CACA,2BAAA,CAEA,8DACC,cAAA,CACA,oBAAA,CAIF,qCACC,eAAA,CACA,sBAAA,CACA,kBAAA,CACA,gBAAA,CAGD,uCACC,YAAA,CACA,WAAA,CACA,YAAA,CACA,qBAAA,CAEA,yCACC,QAAA,CACA,SAAA,CAIF,2CACC,eAAA,CACA,sBAAA,CACA,mBAAA,CACA,oBAAA,CACA,YAAA,CACA,2BAAA,CAGD,oCACC,mCAAA,CAGD,qDACC,YAAA,CAEA,2EACC,SAAA",sourcesContent:["\n.widget-file {\n\tdisplay: flex;\n\tflex-grow: 1;\n\tcolor: var(--color-main-text) !important;\n\ttext-decoration: none !important;\n\n\t&--image {\n\t\tmin-width: 40%;\n\t\tbackground-position: center;\n\t\tbackground-size: cover;\n\t\tbackground-repeat: no-repeat;\n\n\t\t&.widget-file--image--icon {\n\t\t\tmin-width: 88px;\n\t\t\tbackground-size: 44px;\n\t\t}\n\t}\n\n\t&--title {\n\t\toverflow: hidden;\n\t\ttext-overflow: ellipsis;\n\t\twhite-space: nowrap;\n\t\tfont-weight: bold;\n\t}\n\n\t&--details {\n\t\tpadding: 12px;\n\t\tflex-grow: 1;\n\t\tdisplay: flex;\n\t\tflex-direction: column;\n\n\t\tp {\n\t\t\tmargin: 0;\n\t\t\tpadding: 0;\n\t\t}\n\t}\n\n\t&--description {\n\t\toverflow: hidden;\n\t\ttext-overflow: ellipsis;\n\t\tdisplay: -webkit-box;\n\t\t-webkit-line-clamp: 3;\n\t\tline-clamp: 3;\n\t\t-webkit-box-orient: vertical;\n\t}\n\n\t&--link {\n\t\tcolor: var(--color-text-maxcontrast);\n\t}\n\n\t&.widget-file--no-access {\n\t\tpadding: 12px;\n\n\t\t.widget-file--details {\n\t\t\tpadding: 0;\n\t\t}\n\t}\n}\n"],sourceRoot:""}]),e.Z=a},42761:function(t){t.exports="data:image/svg+xml;base64,PCEtLSBUaGlzIGljb24gaXMgcGFydCBvZiBNYXRlcmlhbCBVSSBJY29ucy4gQ29weXJpZ2h0IDIwMjAgR29vZ2xlIEluYy4sIEFwYWNoZS0yLjAgTGljZW5zZSAtLT4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNiAxNiI+PHBhdGggZD0iTS00LTRoMjR2MjRILTRWLTR6IiBmaWxsPSJub25lIi8+PHBhdGggZD0iTTggMEMzLjYgMCAwIDMuNiAwIDhzMy42IDggOCA4IDgtMy42IDgtOC0zLjYtOC04LTh6IiBmaWxsPSIjZWQ0ODRjIi8+PHBhdGggZD0iTTUgNi41aDZjLjggMCAxLjUuNyAxLjUgMS41cy0uNyAxLjUtMS41IDEuNUg1Yy0uOCAwLTEuNS0uNy0xLjUtMS41UzQuMiA2LjUgNSA2LjV6IiBmaWxsPSIjZmRmZmZmIi8+PC9zdmc+Cg=="},87210:function(t){t.exports="data:image/svg+xml;base64,PCEtLSBUaGlzIGljb24gaXMgcGFydCBvZiBNYXRlcmlhbCBVSSBJY29ucy4gQ29weXJpZ2h0IDIwMjAgR29vZ2xlIEluYy4sIEFwYWNoZS0yLjAgTGljZW5zZSAtLT4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNiAxNiI+PHBhdGggZD0iTTQuOCAxMS4yaDYuNFY0LjhINC44djYuNHpNOCAwQzMuNiAwIDAgMy42IDAgOHMzLjYgOCA4IDggOC0zLjYgOC04LTMuNi04LTgtOHoiIGZpbGw9IiM0OWIzODIiLz48L3N2Zz4K"},94659:function(t){t.exports="data:image/svg+xml;base64,PCEtLSBUaGlzIGljb24gaXMgcGFydCBvZiBNYXRlcmlhbCBVSSBJY29ucy4gQ29weXJpZ2h0IDIwMjAgR29vZ2xlIEluYy4sIEFwYWNoZS0yLjAgTGljZW5zZSAtLT4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNiAxNiI+PHBhdGggZmlsbD0ibm9uZSIgZD0iTS00LTRoMjR2MjRILTR6Ii8+PHBhdGggZD0iTTYuOS4xQzMgLjYtLjEgNC0uMSA4YzAgNC40IDMuNiA4IDggOCA0IDAgNy40LTMgOC02LjktMS4yIDEuMy0yLjkgMi4xLTQuNyAyLjEtMy41IDAtNi40LTIuOS02LjQtNi40IDAtMS45LjgtMy42IDIuMS00Ljd6IiBmaWxsPSIjZjRhMzMxIi8+PC9zdmc+Cg=="},41604:function(t,e,n){n.d(e,{N:function(){return O}});var r=n(65374),i=n(93664),o=n(79753),a=n(76311),c=n(28600),l=n(21955),s=n(10979),u=n(41074),d=n(38878),f=n(27172),p=n(20469),h=n(66875),g=n(72090),A=n(25108);const m=/(\s|^)(https?:\/\/)((?:[-A-Z0-9+_]+\.)+[-A-Z]+(?:\/[-A-Z0-9+&@#%?=~_|!:,.;()]*)*)(\s|$)/gi,v=/(\s|\(|^)((https?:\/\/)((?:[-A-Z0-9+_]+\.)+[-A-Z0-9]+(?::[0-9]+)?(?:\/[-A-Z0-9+&@#%?=~_|!:,.;()]*)*))(?=\s|\)|$)/gi,w={name:"NcReferenceList",components:{NcReferenceWidget:r.N},props:{text:{type:String,default:""},referenceData:{type:Object,default:null},limit:{type:Number,default:1}},data(){return{references:null,loading:!0}},computed:{isVisible(){return this.loading||this.displayedReferences},values(){return this.referenceData?this.referenceData:this.references?Object.values(this.references):[]},firstReference(){var t;return null!=(t=this.values[0])?t:null},displayedReferences(){return this.values.slice(0,this.limit)}},watch:{text:"fetch"},mounted(){this.fetch()},methods:{fetch(){this.loading=!0,this.referenceData?this.loading=!1:new RegExp(m).exec(this.text)?this.resolve().then((t=>{this.references=t.data.ocs.data.references,this.loading=!1})).catch((t=>{A.error("Failed to extract references",t),this.loading=!1})):this.loading=!1},resolve(){const t=new RegExp(m).exec(this.text.trim());return 1===this.limit&&t?i.Z.get((0,o.generateOcsUrl)("references/resolve",2)+`?reference=${encodeURIComponent(t[0])}`):i.Z.post((0,o.generateOcsUrl)("references/extract",2),{text:this.text,resolve:!0,limit:this.limit})}}};var y=function(){var t=this,e=t._self._c;return t.isVisible?e("div",{staticClass:"widgets--list",class:{"icon-loading":t.loading}},t._l(t.displayedReferences,(function(t){var n;return e("div",{key:null==(n=null==t?void 0:t.openGraphObject)?void 0:n.id},[e("NcReferenceWidget",{attrs:{reference:t}})],1)})),0):t._e()},x=[];const C=(0,a.n)(w,y,x,!1,null,"bd1fbb02",null,null).exports,b={name:"NcLink",props:{href:{type:String,required:!0}},render(t){return t("a",{attrs:{href:this.href,rel:"noopener noreferrer",target:"_blank",class:"rich-text--external-link"}},[this.href.trim()])}},j=function({autolink:t,useMarkdown:e}){return function(n){!e||!t||(0,c.Vn)(n,(t=>"text"===t.type),((t,e,n)=>{let r=k(t.value);return r=r.map((t=>"string"==typeof t?(0,s.u)("text",t):(0,s.u)("link",{url:t.props.href},[(0,s.u)("text",t.props.href)]))).filter((t=>t)),n.children.splice(e,1,...r.flat()),[l.AM,e+r.flat().length]}))}},k=t=>{let e=v.exec(t);const n=[];let r=0;for(;null!==e;){let i,o=e[2],a=t.substring(r,e.index+e[1].length);" "===o[0]&&(a+=o[0],o=o.substring(1).trim());const c=o[o.length-1];("."===c||","===c||";"===c||"("===e[0][0]&&")"===c)&&(o=o.substring(0,o.length-1),i=c),n.push(a),n.push({component:b,props:{href:o}}),i&&n.push(i),r=e.index+e[0].length,e=v.exec(t)}return n.push(t.substring(r)),t===n.map((t=>"string"==typeof t?t:t.props.href)).join("")?n:(A.error("Failed to reassemble the chunked text: "+t),t)},I=function(){return function(t){(0,c.Vn)(t,(t=>"text"===t.type),(function(t,e,n){const r=t.value.split(/(\{[a-z\-_.0-9]+\})/gi).map(((t,e,n)=>{const r=t.match(/^\{([a-z\-_.0-9]+)\}$/i);if(!r)return(0,s.u)("text",t);const[,i]=r;return(0,s.u)("element",{tagName:`#${i}`})}));n.children.splice(e,1,...r)}))}},L={name:"NcRichText",components:{NcReferenceList:C},props:{text:{type:String,default:""},arguments:{type:Object,default:()=>({})},referenceLimit:{type:Number,default:0},references:{type:Object,default:null},markdownCssClasses:{type:Object,default:()=>({a:"rich-text--external-link",ol:"rich-text--ordered-list",ul:"rich-text--un-ordered-list",li:"rich-text--list-item",strong:"rich-text--strong",em:"rich-text--italic",h1:"rich-text--heading rich-text--heading-1",h2:"rich-text--heading rich-text--heading-2",h3:"rich-text--heading rich-text--heading-3",h4:"rich-text--heading rich-text--heading-4",h5:"rich-text--heading rich-text--heading-5",h6:"rich-text--heading rich-text--heading-6",hr:"rich-text--hr",table:"rich-text--table",pre:"rich-text--pre",code:"rich-text--code",blockquote:"rich-text--blockquote"})},useMarkdown:{type:Boolean,default:!1},autolink:{type:Boolean,default:!0}},methods:{renderPlaintext(t){const e=this,n=this.text.split(/(\{[a-z\-_.0-9]+\})/gi).map((function(n,r,i){const o=n.match(/^\{([a-z\-_.0-9]+)\}$/i);if(!o)return(({h:t,context:e},n)=>(e.autolink&&(n=k(n)),Array.isArray(n)?n.map((e=>{if("string"==typeof e)return e;const{component:n,props:r}=e,i="NcLink"===n.name?void 0:"rich-text--component";return t(n,{props:r,class:i})})):n))({h:t,context:e},n);const a=o[1],c=e.arguments[a];if("object"==typeof c){const{component:e,props:n}=c;return t(e,{props:n,class:"rich-text--component"})}return c?t("span",{class:"rich-text--fallback"},c):n}));return t("div",{class:"rich-text--wrapper"},[t("div",{},n.flat()),this.referenceLimit>0?t("div",{class:"rich-text--reference-widget"},[t(C,{props:{text:this.text,referenceData:this.references}})]):null])},renderMarkdown(t){const e=(0,u.l)().use(d.Z).use(j,{autolink:this.autolink,useMarkdown:this.useMarkdown}).use(f.Z).use(p.Z,{handlers:{component(t,e){return t(e,e.component,{value:e.value})}}}).use(I).use(g.Z,{target:"_blank",rel:["noopener noreferrer"]}).use(h.Z,{createElement:(e,n,r)=>{if(r=null==r?void 0:r.map((t=>"string"==typeof t?t.replace(/&lt;/gim,"<"):t)),!e.startsWith("#"))return t(e,n,r);const i=this.arguments[e.slice(1)];return i?i.component?t(i.component,{attrs:n,props:i.props,class:"rich-text--component"},r):t("span",n,[i]):t("span",{attrs:n,class:"rich-text--fallback"},[`{${e.slice(1)}}`])},prefix:!1}).processSync(this.text.replace(/</gim,"&lt;").replace(/&gt;/gim,">")).result;return t("div",{class:"rich-text--wrapper rich-text--wrapper-markdown"},[e,this.referenceLimit>0?t("div",{class:"rich-text--reference-widget"},[t(C,{props:{text:this.text,referenceData:this.references}})]):null])}},render(t){return this.useMarkdown?this.renderMarkdown(t):this.renderPlaintext(t)}},O=(0,a.n)(L,null,null,!1,null,"5f33f45b",null,null).exports}},o={};function a(t){var e=o[t];if(void 0!==e)return e.exports;var n=o[t]={id:t,loaded:!1,exports:{}};return i[t].call(n.exports,n,n.exports,a),n.loaded=!0,n.exports}a.m=i,e=[],a.O=function(t,n,r,i){if(!n){var o=1/0;for(u=0;u<e.length;u++){n=e[u][0],r=e[u][1],i=e[u][2];for(var c=!0,l=0;l<n.length;l++)(!1&i||o>=i)&&Object.keys(a.O).every((function(t){return a.O[t](n[l])}))?n.splice(l--,1):(c=!1,i<o&&(o=i));if(c){e.splice(u--,1);var s=r();void 0!==s&&(t=s)}}return t}i=i||0;for(var u=e.length;u>0&&e[u-1][2]>i;u--)e[u]=e[u-1];e[u]=[n,r,i]},a.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return a.d(e,{a:e}),e},a.d=function(t,e){for(var n in e)a.o(e,n)&&!a.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:e[n]})},a.f={},a.e=function(t){return Promise.all(Object.keys(a.f).reduce((function(e,n){return a.f[n](t,e),e}),[]))},a.u=function(t){return t+"-"+t+".js?v="+{2250:"34f75a254de23027f023",7608:"2de5b5298b94ca1c8bf6"}[t]},a.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(t){if("object"==typeof window)return window}}(),a.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n={},r="nextcloud:",a.l=function(t,e,i,o){if(n[t])n[t].push(e);else{var c,l;if(void 0!==i)for(var s=document.getElementsByTagName("script"),u=0;u<s.length;u++){var d=s[u];if(d.getAttribute("src")==t||d.getAttribute("data-webpack")==r+i){c=d;break}}c||(l=!0,(c=document.createElement("script")).charset="utf-8",c.timeout=120,a.nc&&c.setAttribute("nonce",a.nc),c.setAttribute("data-webpack",r+i),c.src=t),n[t]=[e];var f=function(e,r){c.onerror=c.onload=null,clearTimeout(p);var i=n[t];if(delete n[t],c.parentNode&&c.parentNode.removeChild(c),i&&i.forEach((function(t){return t(r)})),e)return e(r)},p=setTimeout(f.bind(null,void 0,{type:"timeout",target:c}),12e4);c.onerror=f.bind(null,c.onerror),c.onload=f.bind(null,c.onload),l&&document.head.appendChild(c)}},a.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},a.nmd=function(t){return t.paths=[],t.children||(t.children=[]),t},a.j=9098,function(){var t;a.g.importScripts&&(t=a.g.location+"");var e=a.g.document;if(!t&&e&&(e.currentScript&&(t=e.currentScript.src),!t)){var n=e.getElementsByTagName("script");if(n.length)for(var r=n.length-1;r>-1&&!t;)t=n[r--].src}if(!t)throw new Error("Automatic publicPath is not supported in this browser");t=t.replace(/#.*$/,"").replace(/\?.*$/,"").replace(/\/[^\/]+$/,"/"),a.p=t}(),function(){a.b=document.baseURI||self.location.href;var t={9098:0};a.f.j=function(e,n){var r=a.o(t,e)?t[e]:void 0;if(0!==r)if(r)n.push(r[2]);else{var i=new Promise((function(n,i){r=t[e]=[n,i]}));n.push(r[2]=i);var o=a.p+a.u(e),c=new Error;a.l(o,(function(n){if(a.o(t,e)&&(0!==(r=t[e])&&(t[e]=void 0),r)){var i=n&&("load"===n.type?"missing":n.type),o=n&&n.target&&n.target.src;c.message="Loading chunk "+e+" failed.\n("+i+": "+o+")",c.name="ChunkLoadError",c.type=i,c.request=o,r[1](c)}}),"chunk-"+e,e)}},a.O.j=function(e){return 0===t[e]};var e=function(e,n){var r,i,o=n[0],c=n[1],l=n[2],s=0;if(o.some((function(e){return 0!==t[e]}))){for(r in c)a.o(c,r)&&(a.m[r]=c[r]);if(l)var u=l(a)}for(e&&e(n);s<o.length;s++)i=o[s],a.o(t,i)&&t[i]&&t[i][0](),t[i]=0;return a.O(u)},n=self.webpackChunknextcloud=self.webpackChunknextcloud||[];n.forEach(e.bind(null,0)),n.push=e.bind(null,n.push.bind(n))}(),a.nc=void 0;var c=a.O(void 0,[7874],(function(){return a(94032)}));c=a.O(c)}();
//# sourceMappingURL=files-reference-files.js.map?v=09c96e970026e89b7b66