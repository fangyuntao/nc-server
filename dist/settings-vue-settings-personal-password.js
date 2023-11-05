/*! For license information please see settings-vue-settings-personal-password.js.LICENSE.txt */
!function(){"use strict";var t,e,n,r={18012:function(t,e,n){var r=n(20144),s=n(67912),o=n(57274),a=n(16972),i=n(93664),c=n(79753),l=n(64024),u={name:"PasswordSection",components:{NcSettingsSection:s.Z,NcButton:o.Z,NcPasswordField:a.Z},data:function(){return{oldPass:"",newPass:""}},methods:{changePassword:function(){var t=this;i.Z.post((0,c.generateUrl)("/settings/personal/changepassword"),{oldpassword:this.oldPass,newpassword:this.newPass}).then((function(t){return t.data})).then((function(e){"error"===e.status?(t.errorMessage=e.data.message,(0,l.x2)(e.data.message)):(0,l.s$)(e.data.message)}))}}},d=n(93379),p=n.n(d),f=n(7795),m=n.n(f),h=n(90569),w=n.n(h),g=n(3565),v=n.n(g),b=n(19216),P=n.n(b),y=n(44589),A=n.n(y),N=n(15388),S={};S.styleTagTransform=A(),S.setAttributes=v(),S.insert=w().bind(null,"head"),S.domAPI=m(),S.insertStyleElement=P(),p()(N.Z,S),N.Z&&N.Z.locals&&N.Z.locals;var x=(0,n(51900).Z)(u,(function(){var t=this,e=t._self._c;return e("NcSettingsSection",{attrs:{name:t.t("settings","Password")}},[e("form",{attrs:{id:"passwordform",method:"POST"},on:{submit:function(e){return e.preventDefault(),t.changePassword.apply(null,arguments)}}},[e("NcPasswordField",{attrs:{id:"old-pass",label:t.t("settings","Current password"),name:"oldpassword",value:t.oldPass,autocomplete:"current-password",autocapitalize:"none",spellcheck:"false"},on:{"update:value":function(e){t.oldPass=e}}}),t._v(" "),e("NcPasswordField",{attrs:{id:"new-pass",label:t.t("settings","New password"),value:t.newPass,maxlength:469,autocomplete:"new-password",autocapitalize:"none",spellcheck:"false","check-password-strength":!0},on:{"update:value":function(e){t.newPass=e}}}),t._v(" "),e("NcButton",{attrs:{type:"primary","native-type":"submit",disabled:0===t.newPass.length||0===t.oldPass.length}},[t._v("\n\t\t\t"+t._s(t.t("settings","Change password"))+"\n\t\t")])],1)])}),[],!1,null,null,null),C=x.exports,T=n(31352);n.nc=btoa(OC.requestToken),r.default.prototype.t=T.Iu,r.default.prototype.n=T.uN,new r.default({el:"#security-password",name:"main-personal-password",render:function(t){return t(C)}})},15388:function(t,e,n){var r=n(87537),s=n.n(r),o=n(23645),a=n.n(o)()(s());a.push([t.id,"\n#passwordform {\n\tdisplay: flex;\n\tflex-direction: column;\n\tgap: 1rem;\n\tmax-width: 400px;\n}\n","",{version:3,sources:["webpack://./apps/settings/src/components/PasswordSection.vue"],names:[],mappings:";AAiGA;CACA,aAAA;CACA,sBAAA;CACA,SAAA;CACA,gBAAA;AACA",sourcesContent:['\x3c!--\n  - @copyright 2022 Carl Schwan <carl@carlschwan.eu>\n  -\n  - @license GNU AGPL version 3 or any later version\n  -\n  - This program is free software: you can redistribute it and/or modify\n  - it under the terms of the GNU Affero General Public License as\n  - published by the Free Software Foundation, either version 3 of the\n  - License, or (at your option) any later version.\n  -\n  - This program is distributed in the hope that it will be useful,\n  - but WITHOUT ANY WARRANTY; without even the implied warranty of\n  - MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the\n  - GNU Affero General Public License for more details.\n  -\n  - You should have received a copy of the GNU Affero General Public License\n  - along with this program.  If not, see <http://www.gnu.org/licenses/>.\n  --\x3e\n<template>\n\t<NcSettingsSection :name="t(\'settings\', \'Password\')">\n\t\t<form id="passwordform" method="POST" @submit.prevent="changePassword">\n\t\t\t<NcPasswordField id="old-pass"\n\t\t\t\t:label="t(\'settings\', \'Current password\')"\n\t\t\t\tname="oldpassword"\n\t\t\t\t:value.sync="oldPass"\n\t\t\t\tautocomplete="current-password"\n\t\t\t\tautocapitalize="none"\n\t\t\t\tspellcheck="false" />\n\n\t\t\t<NcPasswordField id="new-pass"\n\t\t\t\t:label="t(\'settings\', \'New password\')"\n\t\t\t\t:value.sync="newPass"\n\t\t\t\t:maxlength="469"\n\t\t\t\tautocomplete="new-password"\n\t\t\t\tautocapitalize="none"\n\t\t\t\tspellcheck="false"\n\t\t\t\t:check-password-strength="true" />\n\n\t\t\t<NcButton type="primary"\n\t\t\t\tnative-type="submit"\n\t\t\t\t:disabled="newPass.length === 0 || oldPass.length === 0">\n\t\t\t\t{{ t(\'settings\', \'Change password\') }}\n\t\t\t</NcButton>\n\t\t</form>\n\t</NcSettingsSection>\n</template>\n\n<script>\nimport NcSettingsSection from \'@nextcloud/vue/dist/Components/NcSettingsSection.js\'\nimport NcButton from \'@nextcloud/vue/dist/Components/NcButton.js\'\nimport NcPasswordField from \'@nextcloud/vue/dist/Components/NcPasswordField.js\'\nimport axios from \'@nextcloud/axios\'\nimport { generateUrl } from \'@nextcloud/router\'\nimport { showSuccess, showError } from \'@nextcloud/dialogs\'\n\nexport default {\n\tname: \'PasswordSection\',\n\tcomponents: {\n\t\tNcSettingsSection,\n\t\tNcButton,\n\t\tNcPasswordField,\n\t},\n\tdata() {\n\t\treturn {\n\t\t\toldPass: \'\',\n\t\t\tnewPass: \'\',\n\t\t}\n\t},\n\tmethods: {\n\t\tchangePassword() {\n\t\t\taxios.post(generateUrl(\'/settings/personal/changepassword\'), {\n\t\t\t\toldpassword: this.oldPass,\n\t\t\t\tnewpassword: this.newPass,\n\t\t\t})\n\t\t\t\t.then(res => res.data)\n\t\t\t\t.then(data => {\n\t\t\t\t\tif (data.status === \'error\') {\n\t\t\t\t\t\tthis.errorMessage = data.data.message\n\t\t\t\t\t\tshowError(data.data.message)\n\t\t\t\t\t} else {\n\t\t\t\t\t\tshowSuccess(data.data.message)\n\t\t\t\t\t}\n\t\t\t\t})\n\t\t},\n\t},\n}\n<\/script>\n\n<style>\n\t#passwordform {\n\t\tdisplay: flex;\n\t\tflex-direction: column;\n\t\tgap: 1rem;\n\t\tmax-width: 400px;\n\t}\n</style>\n'],sourceRoot:""}]),e.Z=a}},s={};function o(t){var e=s[t];if(void 0!==e)return e.exports;var n=s[t]={id:t,loaded:!1,exports:{}};return r[t].call(n.exports,n,n.exports,o),n.loaded=!0,n.exports}o.m=r,t=[],o.O=function(e,n,r,s){if(!n){var a=1/0;for(u=0;u<t.length;u++){n=t[u][0],r=t[u][1],s=t[u][2];for(var i=!0,c=0;c<n.length;c++)(!1&s||a>=s)&&Object.keys(o.O).every((function(t){return o.O[t](n[c])}))?n.splice(c--,1):(i=!1,s<a&&(a=s));if(i){t.splice(u--,1);var l=r();void 0!==l&&(e=l)}}return e}s=s||0;for(var u=t.length;u>0&&t[u-1][2]>s;u--)t[u]=t[u-1];t[u]=[n,r,s]},o.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return o.d(e,{a:e}),e},o.d=function(t,e){for(var n in e)o.o(e,n)&&!o.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:e[n]})},o.f={},o.e=function(t){return Promise.all(Object.keys(o.f).reduce((function(e,n){return o.f[n](t,e),e}),[]))},o.u=function(t){return t+"-"+t+".js?v="+{2250:"34f75a254de23027f023",7608:"8f5e95d03aa28a2cf45c"}[t]},o.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(t){if("object"==typeof window)return window}}(),o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},e={},n="nextcloud:",o.l=function(t,r,s,a){if(e[t])e[t].push(r);else{var i,c;if(void 0!==s)for(var l=document.getElementsByTagName("script"),u=0;u<l.length;u++){var d=l[u];if(d.getAttribute("src")==t||d.getAttribute("data-webpack")==n+s){i=d;break}}i||(c=!0,(i=document.createElement("script")).charset="utf-8",i.timeout=120,o.nc&&i.setAttribute("nonce",o.nc),i.setAttribute("data-webpack",n+s),i.src=t),e[t]=[r];var p=function(n,r){i.onerror=i.onload=null,clearTimeout(f);var s=e[t];if(delete e[t],i.parentNode&&i.parentNode.removeChild(i),s&&s.forEach((function(t){return t(r)})),n)return n(r)},f=setTimeout(p.bind(null,void 0,{type:"timeout",target:i}),12e4);i.onerror=p.bind(null,i.onerror),i.onload=p.bind(null,i.onload),c&&document.head.appendChild(i)}},o.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.nmd=function(t){return t.paths=[],t.children||(t.children=[]),t},o.j=3574,function(){var t;o.g.importScripts&&(t=o.g.location+"");var e=o.g.document;if(!t&&e&&(e.currentScript&&(t=e.currentScript.src),!t)){var n=e.getElementsByTagName("script");if(n.length)for(var r=n.length-1;r>-1&&!t;)t=n[r--].src}if(!t)throw new Error("Automatic publicPath is not supported in this browser");t=t.replace(/#.*$/,"").replace(/\?.*$/,"").replace(/\/[^\/]+$/,"/"),o.p=t}(),function(){o.b=document.baseURI||self.location.href;var t={3574:0};o.f.j=function(e,n){var r=o.o(t,e)?t[e]:void 0;if(0!==r)if(r)n.push(r[2]);else{var s=new Promise((function(n,s){r=t[e]=[n,s]}));n.push(r[2]=s);var a=o.p+o.u(e),i=new Error;o.l(a,(function(n){if(o.o(t,e)&&(0!==(r=t[e])&&(t[e]=void 0),r)){var s=n&&("load"===n.type?"missing":n.type),a=n&&n.target&&n.target.src;i.message="Loading chunk "+e+" failed.\n("+s+": "+a+")",i.name="ChunkLoadError",i.type=s,i.request=a,r[1](i)}}),"chunk-"+e,e)}},o.O.j=function(e){return 0===t[e]};var e=function(e,n){var r,s,a=n[0],i=n[1],c=n[2],l=0;if(a.some((function(e){return 0!==t[e]}))){for(r in i)o.o(i,r)&&(o.m[r]=i[r]);if(c)var u=c(o)}for(e&&e(n);l<a.length;l++)s=a[l],o.o(t,s)&&t[s]&&t[s][0](),t[s]=0;return o.O(u)},n=self.webpackChunknextcloud=self.webpackChunknextcloud||[];n.forEach(e.bind(null,0)),n.push=e.bind(null,n.push.bind(n))}(),o.nc=void 0;var a=o.O(void 0,[7874],(function(){return o(18012)}));a=o.O(a)}();
//# sourceMappingURL=settings-vue-settings-personal-password.js.map?v=53c9cd89f9d87dc93588