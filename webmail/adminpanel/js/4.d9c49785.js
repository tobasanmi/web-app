(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[4],{"0449":function(t,e,n){"use strict";n("253f")},2287:function(t,e,n){"use strict";var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"flex column"},[n("q-list",{staticClass:"col-auto bg-grey-3"},[n("q-item",[n("q-item-section",{attrs:{side:""}},[n("q-checkbox",{attrs:{dense:""},model:{value:t.hasCheckedItems,callback:function(e){t.hasCheckedItems=e},expression:"hasCheckedItems"}})],1),n("q-item-section",[n("q-input",{attrs:{rounded:"",outlined:"",dense:"",autocomplete:"off"},on:{keyup:function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:t.startSearch(e)}},scopedSlots:t._u([{key:"append",fn:function(){return[n("q-icon",{staticClass:"q-btn-search search",attrs:{flat:"",ripple:!1,dense:"",name:"search"},on:{click:t.startSearch}})]},proxy:!0}]),model:{value:t.enteredSearch,callback:function(e){t.enteredSearch=e},expression:"enteredSearch"}})],1)],1),n("q-separator")],1),n("q-inner-loading",{staticStyle:{position:"relative","min-height":"4px"},attrs:{showing:t.loading}},[n("q-linear-progress",{attrs:{query:""}})],1),n("q-scroll-area",{staticClass:"col-grow relative-position"},[t.search?n("div",{staticClass:"text-right"},[n("q-btn",{staticClass:"no-hover q-mr-sm",attrs:{dense:"",flat:"","no-caps":"",color:"primary",label:t.$t("COREWEBCLIENT.ACTION_CLEAR_SEARCH")},nativeOn:{click:function(e){return e.stopPropagation(),t.clearSearch(e)}}})],1):t._e(),t.search?n("div",{staticClass:"text-center text-h6 text-grey-5 text-weight-regular"},[t._v("\n      "+t._s(t.$tc("ADMINPANELWEBCLIENT.INFO_SEARCH_RESULT",t.search,{SEARCH:t.search}))+"\n    ")]):t._e(),t.loading||0!==t.items.length||t.search?t._e():n("div",{staticClass:"q-ma-md text-center text-h6 text-grey-5 text-weight-regular"},[t._v("\n      "+t._s(t.$t(t.noItemsText))+"\n    ")]),!t.loading&&0===t.items.length&&t.search?n("div",{staticClass:"q-ma-md text-center text-h6 text-grey-5 text-weight-regular"},[t._v("\n      "+t._s(t.$t(t.noItemsFoundText))+"\n    ")]):t._e(),n("q-list",t._l(t.items,(function(e){return n("div",{key:e.id},[n("q-item",{class:t.getCssClass(e.id,e.checked),attrs:{clickable:""},on:{click:function(n){return t.selectItem(e.id)}}},[n("q-item-section",{attrs:{side:""}},[n("q-checkbox",{attrs:{dense:""},model:{value:e.checked,callback:function(n){t.$set(e,"checked",n)},expression:"item.checked"}})],1),n("q-item-section",[n("q-item-label",{attrs:{lines:"1"}},[t._v(t._s(e.title))])],1),void 0!==e.rightText?n("q-item-section",{attrs:{side:""}},[n("q-item-label",{attrs:{lines:"1"}},[t._v(t._s(e.rightText))])],1):t._e()],1),n("q-separator")],1)})),0)],1),t.totalCountText||t.pagesCount>1?n("q-list",{staticClass:"col-auto"},[n("q-separator"),n("q-item",[n("q-item-section",[n("span",[t._v(t._s(t.totalCountText))])]),t.pagesCount>1?n("q-item-section",{attrs:{side:""}},[n("q-pagination",{attrs:{flat:"","boundary-links":t.pagesCount>5,"max-pages":5,"boundary-numbers":!1,"active-color":"primary",color:"grey-6",max:t.pagesCount},model:{value:t.selectedPage,callback:function(e){t.selectedPage=e},expression:"selectedPage"}})],1):t._e()],1),n("q-separator")],1):t._e()],1)},s=[],i=(n("a9e3"),n("4de4"),n("d81d"),n("ac1f"),n("841c"),n("159b"),{name:"StandardList",props:{items:Array,selectedItem:Number,loading:Boolean,totalCountText:String,search:String,page:Number,pagesCount:Number,noItemsText:String,noItemsFoundText:String},data:function(){return{hasCheckedItems:!1,enteredSearch:"",selectedPage:1}},computed:{checkedIds:function(){var t=this.items.filter((function(t){return t.checked}));return t.map((function(t){return t.id}))}},watch:{search:function(){this.enteredSearch=this.search},selectedPage:function(){this.$emit("route")},page:function(){this.selectedPage=this.page},checkedIds:function(){this.hasCheckedItems=this.checkedIds.length>0,this.$emit("check",this.checkedIds)},hasCheckedItems:function(){!1===this.hasCheckedItems&&this.checkedIds.length>0&&this.items.forEach((function(t){t.checked=!1})),!0===this.hasCheckedItems&&0===this.checkedIds.length&&this.items.forEach((function(t){t.checked=!0}))}},methods:{startSearch:function(){this.$emit("route")},clearSearch:function(){this.enteredSearch="",this.startSearch()},selectItem:function(t){this.$emit("route",t)},getCssClass:function(t,e){return this.selectedItem===t?"bg-selected-item":e?"bg-checked-item":""},decreasePage:function(){this.selectedPage-=1}}}),r=i,o=(n("0449"),n("2877")),l=n("1c1c"),c=n("66e5"),d=n("4074"),h=n("8f8e"),u=n("27f9"),p=n("0016"),m=n("9c40"),f=n("eb85"),T=n("74f7"),g=n("6b1d"),E=n("4983"),v=n("0170"),I=n("3b16"),N=n("eebe"),C=n.n(N),b=Object(o["a"])(r,a,s,!1,null,"3696b374",null);e["a"]=b.exports;C()(b,"components",{QList:l["a"],QItem:c["a"],QItemSection:d["a"],QCheckbox:h["a"],QInput:u["a"],QIcon:p["a"],QBtn:m["a"],QSeparator:f["a"],QInnerLoading:T["a"],QLinearProgress:g["a"],QScrollArea:E["a"],QItemLabel:v["a"],QPagination:I["a"]})},"253f":function(t,e,n){},"2e52":function(t,e,n){"use strict";var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",version:"1.1",id:"svg4258",viewBox:"0 0 32 32.000001",height:"32",width:"32"}},[n("defs",{attrs:{id:"defs4260"}},[n("clipPath",{attrs:{id:"clipPath1830-4",clipPathUnits:"userSpaceOnUse"}},[n("path",{attrs:{id:"path1832-0",d:"m 97,434 32,0 0,-32 -32,0 0,32 z"}})])]),n("g",{attrs:{transform:"translate(0,-1020.3622)",id:"layer1"}},[n("path",{staticStyle:{"font-style":"normal","font-variant":"normal","font-weight":"normal","font-stretch":"normal","font-size":"medium","line-height":"normal","font-family":"sans-serif","text-indent":"0","text-align":"start","text-decoration":"none","text-decoration-line":"none","text-decoration-style":"solid","text-decoration-color":"#000000","letter-spacing":"normal","word-spacing":"normal","text-transform":"none",direction:"ltr","block-progression":"tb","writing-mode":"lr-tb","baseline-shift":"baseline","text-anchor":"start","white-space":"normal","clip-rule":"nonzero",display:"inline",overflow:"visible",visibility:"visible",opacity:"1",isolation:"auto","mix-blend-mode":"normal","color-interpolation":"sRGB","color-interpolation-filters":"linearRGB","solid-color":"#000000","solid-opacity":"1",fill:"#000000","fill-opacity":"1","fill-rule":"nonzero",stroke:"none","stroke-width":"1","stroke-linecap":"round","stroke-linejoin":"round","stroke-miterlimit":"10","stroke-dasharray":"none","stroke-dashoffset":"0","stroke-opacity":"1","color-rendering":"auto","image-rendering":"auto","shape-rendering":"auto","text-rendering":"auto","enable-background":"accumulate"},attrs:{id:"path2552",transform:"translate(0,1020.3622)",d:"M 15.492188 5.4941406 A 0.50005 0.50005 0 0 0 15 6 L 15 15 L 6 15 A 0.50005 0.50005 0 1 0 6 16 L 15 16 L 15 25 A 0.50005 0.50005 0 1 0 16 25 L 16 16 L 25 16 A 0.50005 0.50005 0 1 0 25 15 L 16 15 L 16 6 A 0.50005 0.50005 0 0 0 15.492188 5.4941406 z "}})])])},s=[],i={name:"Add"},r=i,o=n("2877"),l=Object(o["a"])(r,a,s,!1,null,"7028338a",null);e["a"]=l.exports},"5d6c":function(t,e,n){"use strict";n.r(e);var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("q-splitter",{staticClass:"full-height full-width",attrs:{"after-class":t.showTabs?"":"q-splitter__right-panel",limits:[10,30]},scopedSlots:t._u([{key:"before",fn:function(){return[n("div",{staticClass:"flex column full-height "},[n("q-toolbar",{staticClass:"col-auto q-py-sm list-border"},[n("q-btn",{attrs:{flat:"",color:"grey-8",size:"mg","no-wrap":"",disable:0===t.checkedIds.length},on:{click:t.askDeleteCheckedTenants}},[n("Trash"),n("span",[t._v(t._s(t.countLabel))]),n("q-tooltip",[t._v("\n            "+t._s(t.$t("COREWEBCLIENT.ACTION_DELETE"))+"\n          ")])],1),n("q-btn",{attrs:{flat:"",color:"grey-8",size:"mg"},on:{click:t.routeCreateTenant}},[n("Add"),n("q-tooltip",[t._v("\n            "+t._s(t.$t("ADMINPANELWEBCLIENT.ACTION_CREATE_ENTITY_TENANT"))+"\n          ")])],1)],1),n("StandardList",{ref:"tenantList",staticClass:"col-grow list-border",attrs:{items:t.tenantItems,selectedItem:t.selectedTenantId,loading:t.loadingTenants,search:t.search,page:t.page,pagesCount:t.pagesCount,noItemsText:"ADMINPANELWEBCLIENT.INFO_NO_ENTITIES_TENANT",noItemsFoundText:"ADMINPANELWEBCLIENT.INFO_NO_ENTITIES_FOUND_TENANT"},on:{route:t.route,check:t.afterCheck}})],1)]},proxy:!0},{key:"after",fn:function(){return[t.showTabs?n("q-splitter",{staticClass:"full-height full-width",attrs:{"after-class":"q-splitter__right-panel",limits:[10,30]},scopedSlots:t._u([{key:"before",fn:function(){return[n("q-list",[n("div",[n("q-item",{class:""===t.selectedTab?"bg-selected-item":"",attrs:{clickable:""},on:{click:function(e){return t.route(t.selectedTenantId)}}},[n("q-item-section",[n("q-item-label",{directives:[{name:"t",rawName:"v-t",value:"ADMINPANELWEBCLIENT.LABEL_COMMON_SETTINGS_TAB",expression:"'ADMINPANELWEBCLIENT.LABEL_COMMON_SETTINGS_TAB'"}],attrs:{lines:"1"}})],1)],1),n("q-separator")],1),t._l(t.tabs,(function(e){return n("div",{key:e.tabName},[n("q-item",{class:t.selectedTab===e.tabName?"bg-selected-item":"",attrs:{clickable:""},on:{click:function(n){return t.route(t.selectedTenantId,e.tabName)}}},[n("q-item-section",[n("q-item-label",{attrs:{lines:"1"}},[t._v(t._s(t.$t(e.title)))])],1)],1),n("q-separator")],1)}))],2)]},proxy:!0},{key:"after",fn:function(){return[n("router-view",{attrs:{deletingIds:t.deletingIds},on:{"tenant-created":t.handleCreateTenant,"cancel-create":t.route,"delete-tenant":t.askDeleteTenant}})]},proxy:!0}],null,!1,1970054496),model:{value:t.tabsSplitterWidth,callback:function(e){t.tabsSplitterWidth=e},expression:"tabsSplitterWidth"}}):t._e(),t.showTabs?t._e():n("router-view",{attrs:{deletingIds:t.deletingIds},on:{"tenant-created":t.handleCreateTenant,"cancel-create":t.route,"delete-tenant":t.askDeleteTenant}})]},proxy:!0}]),model:{value:t.listSplitterWidth,callback:function(e){t.listSplitterWidth=e},expression:"listSplitterWidth"}},[n("ConfirmDialog",{ref:"confirmDialog"})],1)},s=[],i=(n("ac1f"),n("841c"),n("1276"),n("7db0"),n("d81d"),n("b0c0"),n("159b"),n("4de4"),n("fb6a"),n("2ef0")),r=n.n(i),o=n("4245"),l=n("21ac"),c=n("6bfe"),d=n("e539"),h=n("0091"),u=n("83d6"),p=n("96ec"),m=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("q-scroll-area",{staticClass:"full-height full-width relative-position"},[n("div",{staticClass:"q-pa-lg"},[n("div",{staticClass:"row q-mb-md"},[t.createMode?t._e():n("div",{directives:[{name:"t",rawName:"v-t",value:"COREWEBCLIENT.HEADING_COMMON_SETTINGS",expression:"'COREWEBCLIENT.HEADING_COMMON_SETTINGS'"}],staticClass:"col text-h5"}),t.createMode?n("div",{directives:[{name:"t",rawName:"v-t",value:"ADMINPANELWEBCLIENT.HEADING_CREATE_TENANT",expression:"'ADMINPANELWEBCLIENT.HEADING_CREATE_TENANT'"}],staticClass:"col text-h5"}):t._e()]),n("q-card",{staticClass:"card-edit-settings",attrs:{flat:"",bordered:""}},[n("q-card-section",[n("div",{staticClass:"row q-mb-md"},[n("div",{directives:[{name:"t",rawName:"v-t",value:"ADMINPANELWEBCLIENT.LABEL_PRODUCT_NAME",expression:"'ADMINPANELWEBCLIENT.LABEL_PRODUCT_NAME'"}],staticClass:"col-2 q-mt-sm"}),t.createMode?n("div",{staticClass:"col-5"},[n("q-input",{attrs:{outlined:"",dense:"","bg-color":"white"},model:{value:t.tenantName,callback:function(e){t.tenantName=e},expression:"tenantName"}})],1):t._e(),t.createMode?t._e():n("div",{staticClass:"col-5 q-mt-sm"},[t._v(t._s(t.tenantName))])]),n("div",{staticClass:"row q-mb-md"},[n("div",{directives:[{name:"t",rawName:"v-t",value:"ADMINPANELWEBCLIENT.LABEL_DESCRIPTION",expression:"'ADMINPANELWEBCLIENT.LABEL_DESCRIPTION'"}],staticClass:"col-2 q-mt-sm"}),n("div",{staticClass:"col-5"},[n("q-input",{attrs:{outlined:"",dense:"","bg-color":"white"},model:{value:t.description,callback:function(e){t.description=e},expression:"description"}})],1)]),n("div",{staticClass:"row q-mb-md"},[n("div",{directives:[{name:"t",rawName:"v-t",value:"ADMINPANELWEBCLIENT.LABEL_WEB_DOMAIN",expression:"'ADMINPANELWEBCLIENT.LABEL_WEB_DOMAIN'"}],staticClass:"col-2 q-mt-sm"}),n("div",{staticClass:"col-5"},[n("q-input",{attrs:{outlined:"",dense:"","bg-color":"white"},model:{value:t.webDomain,callback:function(e){t.webDomain=e},expression:"webDomain"}})],1)]),n("div",{staticClass:"row"},[n("div",{directives:[{name:"t",rawName:"v-t",value:"COREWEBCLIENT.LABEL_SITENAME",expression:"'COREWEBCLIENT.LABEL_SITENAME'"}],staticClass:"col-2 q-mt-sm"}),n("div",{staticClass:"col-5"},[n("q-input",{attrs:{outlined:"",dense:"","bg-color":"white"},model:{value:t.tenantSiteName,callback:function(e){t.tenantSiteName=e},expression:"tenantSiteName"}})],1)]),n(t.otherDataComponents,{tag:"component",on:{updateParent:t.getTenantData}})],1)],1),n("div",{staticClass:"q-py-md text-right"},[t.createMode?t._e():n("q-btn",{staticClass:"q-px-sm",attrs:{unelevated:"","no-caps":"",dense:"",ripple:!1,color:"negative",label:t.$t("ADMINPANELWEBCLIENT.ACTION_DELETE_TENANT")},on:{click:t.deleteTenant}}),t.createMode?t._e():n("q-btn",{staticClass:"q-px-sm q-ml-sm",attrs:{unelevated:"","no-caps":"",dense:"",ripple:!1,color:"primary",label:t.$t("COREWEBCLIENT.ACTION_SAVE")},on:{click:t.save}}),t.createMode?n("q-btn",{staticClass:"q-px-sm q-ml-sm",attrs:{unelevated:"","no-caps":"",dense:"",ripple:!1,color:"primary",label:t.$t("COREWEBCLIENT.ACTION_CREATE")},on:{click:t.save}}):t._e(),t.createMode?n("q-btn",{staticClass:"q-px-sm q-ml-sm",attrs:{unelevated:"","no-caps":"",dense:"",ripple:!1,color:"secondary",label:t.$t("COREWEBCLIENT.ACTION_CANCEL")},on:{click:t.save}}):t._e()],1)],1),n("q-inner-loading",{staticStyle:{"justify-content":"flex-start"},attrs:{showing:t.loading||t.deleting||t.saving}},[n("q-linear-progress",{attrs:{query:""}})],1)],1)},f=[],T=n("c973"),g=n.n(T),E=(n("a4d3"),n("e01a"),n("96cf"),n("1e92")),v={name:"EditTenant",props:{deletingIds:Array},data:function(){return{tenant:null,tenantId:0,tenantName:"",tenantSiteName:"",description:"",webDomain:"",saving:!1,loading:!1,otherDataComponents:null,enableBusinessTenant:!1,enableGroupWare:!1}},computed:{currentTenantId:function(){return this.$store.getters["tenants/getCurrentTenantId"]},allTenants:function(){return this.$store.getters["tenants/getTenants"]},createMode:function(){var t;return 0===(null===(t=this.tenant)||void 0===t?void 0:t.id)},deleting:function(){var t;return-1!==this.deletingIds.indexOf(null===(t=this.tenant)||void 0===t?void 0:t.id)}},mounted:function(){var t=this;return g()(regeneratorRuntime.mark((function e(){return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:return t.loading=!1,t.saving=!1,t.parseRoute(),e.next=5,h["a"].getTenantOtherDataComponents();case 5:t.otherDataComponents=e.sent;case 6:case"end":return e.stop()}}),e)})))()},watch:{$route:function(){this.parseRoute()},allTenants:function(){this.populate()}},methods:{getTenantData:function(t){this.enableBusinessTenant=t.enableBusinessTenant,this.enableGroupWare=t.enableGroupWare},parseRoute:function(){if("/tenants/create"===this.$route.path){var t=new E["a"];this.fillUp(t)}else{var e,n,a,s=c["a"].pPositiveInt(null===(e=this.$route)||void 0===e||null===(n=e.params)||void 0===n?void 0:n.id);(null===(a=this.tenant)||void 0===a?void 0:a.id)!==s&&(this.tenant={id:s},this.populate())}},populate:function(){this.$store.dispatch("tenants/completeTenantData",this.tenant.id);var t=this.$store.getters["tenants/getTenant"](this.tenant.id);t&&(this.fillUp(t),this.loading=void 0===t.completeData.Description)},fillUp:function(t){var e,n;this.tenant=t,this.tenantId=t.id,this.tenantName=t.name,this.tenantSiteName=t.siteName,this.description=null===(e=t.completeData)||void 0===e?void 0:e.Description,this.webDomain=null===(n=t.completeData)||void 0===n?void 0:n.WebDomain},save:function(){var t=this;if(!this.saving){this.saving=!0;var e={Name:this.tenantName,Description:this.description,WebDomain:this.webDomain,SiteName:this.tenantSiteName,"CoreUserGroupsLimits::IsBusiness":this.enableBusinessTenant,"CoreUserGroupsLimits::EnableGroupware":this.enableGroupWare},n=this.createMode;n||(e.TenantId=this.currentTenantId),d["a"].sendRequest({moduleName:"Core",methodName:n?"CreateTenant":"UpdateTenant",parameters:e}).then((function(a){n?t.handleCreateResult(a,e):t.handleUpdateResult(a,e),t.saving=!1}),(function(e){t.saving=!1;var a=n?"ERROR_CREATE_ENTITY_TENANT":"ERROR_UPDATE_ENTITY_TENANT";l["a"].showError(o["a"].getTextFromResponse(e,t.$t("ADMINPANELWEBCLIENT."+a)))}))}},handleCreateResult:function(t){r.a.isSafeInteger(t)?(l["a"].showReport(this.$t("ADMINPANELWEBCLIENT.REPORT_CREATE_ENTITY_TENANT")),this.loading=!1,this.populate(),this.$emit("tenant-created",t)):l["a"].showError(this.$t("ADMINPANELWEBCLIENT.ERROR_CREATE_ENTITY_TENANT"))},handleUpdateResult:function(t,e){!0===t?(this.$store.commit("tenants/updateTenant",{id:this.tenantId,data:e}),l["a"].showReport(this.$t("ADMINPANELWEBCLIENT.REPORT_UPDATE_ENTITY_TENANT"))):l["a"].showError(this.$t("ADMINPANELWEBCLIENT.ERROR_UPDATE_ENTITY_TENANT"))},deleteTenant:function(){this.$emit("delete-tenant",this.tenant.id)}}},I=v,N=n("2877"),C=n("4983"),b=n("f09f"),_=n("a370"),A=n("27f9"),L=n("9c40"),k=n("74f7"),x=n("6b1d"),q=n("eebe"),w=n.n(q),R=Object(N["a"])(I,m,f,!1,null,"93d414ae",null),S=R.exports;w()(R,"components",{QScrollArea:C["a"],QCard:b["a"],QCardSection:_["a"],QInput:A["a"],QBtn:L["a"],QInnerLoading:k["a"],QLinearProgress:x["a"]});var D=n("02bc"),$=n("2287"),y=n("2e52"),B=n("952a"),O={name:"Tenants",components:{ConfirmDialog:p["a"],StandardList:$["a"],Add:y["a"],Trash:B["a"]},data:function(){return{tenants:[],selectedTenantId:0,loadingTenants:!1,totalCount:0,search:"",page:1,limit:u["a"].getEntitiesPerPage(),tenantItems:[],checkedIds:[],justCreatedId:0,deletingIds:[],tabs:[],selectedTab:"",listSplitterWidth:localStorage.getItem("tenants-list-splitter-width")||20,tabsSplitterWidth:localStorage.getItem("tenants-tabs-splitter-width")||20}},computed:{currentTenantId:function(){return this.$store.getters["tenants/getCurrentTenantId"]},allTenants:function(){return this.$store.getters["tenants/getTenants"]},pagesCount:function(){return Math.ceil(this.totalCount/this.limit)},countLabel:function(){var t=this.checkedIds.length;return t>0?t:""},showTabs:function(){return this.tabs.length>0&&this.selectedTenantId>0}},watch:{$route:function(t,e){if("/tenants/create"===this.$route.path)this.selectedTenantId=0;else{var n,a,s,i,r,o,l=c["a"].pString(null===(n=this.$route)||void 0===n||null===(a=n.params)||void 0===a?void 0:a.search),d=c["a"].pPositiveInt(null===(s=this.$route)||void 0===s||null===(i=s.params)||void 0===i?void 0:i.page);this.search===l&&this.page===d&&0===this.justCreatedId||(this.search=l,this.page=d,this.populate());var h=c["a"].pNonNegativeInt(null===(r=this.$route)||void 0===r||null===(o=r.params)||void 0===o?void 0:o.id);this.selectedTenantId!==h&&(this.selectedTenantId=h);var u=this.$route.path.split("/"),p=u.length>0?u[u.length-1]:"",m=this.tabs.find((function(t){return t.tabName===p}));this.selectedTab=m?m.tabName:""}},allTenants:function(){var t=this;this.populate();var e=!1;this.justCreatedId&&this.allTenants.find((function(e){return e.id===t.justCreatedId}))&&(this.tenants.find((function(e){return e.id===t.justCreatedId}))&&(this.route(this.justCreatedId),e=!0),this.justCreatedId=0),0!==this.selectedTenantId||e||this.route(this.currentTenantId)},tenants:function(){this.tenants?this.tenantItems=this.tenants.map((function(t){return{id:t.id,title:t.name,checked:!1}})):this.tenantItems=[]},currentTenantId:function(){this.currentTenantId!==this.selectedTenantId&&this.route(this.currentTenantId)},selectedTenantId:function(){this.currentTenantId!==this.selectedTenantId&&0!==this.selectedTenantId&&this.$store.commit("tenants/setCurrentTenantId",this.selectedTenantId)},listSplitterWidth:function(){localStorage.setItem("tenants-list-splitter-width",this.listSplitterWidth)},tabsSplitterWidth:function(){localStorage.setItem("tenants-tabs-splitter-width",this.tabsSplitterWidth)}},mounted:function(){this.$router.addRoute("tenants",{path:"id/:id",component:S}),this.$router.addRoute("tenants",{path:"create",component:S}),this.$router.addRoute("tenants",{path:"search/:search",component:D["a"]}),this.$router.addRoute("tenants",{path:"search/:search/id/:id",component:S}),this.$router.addRoute("tenants",{path:"page/:page",component:D["a"]}),this.$router.addRoute("tenants",{path:"page/:page/id/:id",component:S}),this.$router.addRoute("tenants",{path:"search/:search/page/:page",component:D["a"]}),this.$router.addRoute("tenants",{path:"search/:search/page/:page/id/:id",component:S}),this.populateTabs(),this.populate()},methods:{populateTabs:function(){var t=this;this.tabs=c["a"].pArray(h["a"].getAdminTenantTabs()),r.a.each(this.tabs,(function(e){c["a"].isNonEmptyArray(e.paths)?e.paths.forEach((function(n){t.$router.addRoute("tenants",{path:n,component:e.component})})):t.$router.addRoute("tenants",{path:e.tabName,component:e.component})}))},populate:function(){var t=this.search.toLowerCase(),e=""===t?this.allTenants:this.allTenants.filter((function(e){return-1!==e.name.toLowerCase().indexOf(t)}));this.totalCount=e.length;var n=this.limit*(this.page-1);this.tenants=e.slice(n,n+this.limit)},route:function(){var t,e,n,a,s=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,i=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",r=(null===(t=this.$refs)||void 0===t||null===(e=t.tenantList)||void 0===e?void 0:e.enteredSearch)||"",o=""!==r?"/search/".concat(r):"",l=(null===(n=this.$refs)||void 0===n||null===(a=n.tenantList)||void 0===a?void 0:a.selectedPage)||1;this.search!==r&&(l=1);var c=l>1?"/page/".concat(l):"",d=s>0?"/id/".concat(s):"",h=""!==i?"/".concat(i):"",u="/tenants"+o+c+d+h;u!==this.$route.path&&this.$router.push(u)},routeCreateTenant:function(){this.$router.push("/tenants/create")},handleCreateTenant:function(t){this.justCreatedId=t,this.route(),this.$store.dispatch("tenants/requestTenants")},afterCheck:function(t){this.checkedIds=t},askDeleteTenant:function(t){this.askDeleteTenants([t])},askDeleteCheckedTenants:function(){this.askDeleteTenants(this.checkedIds)},askDeleteTenants:function(t){var e,n;if(r.a.isFunction(null===this||void 0===this||null===(e=this.$refs)||void 0===e||null===(n=e.confirmDialog)||void 0===n?void 0:n.openDialog)){var a=1===t.length?this.tenants.find((function(e){return e.id===t[0]})):null,s=a?a.name:"";this.$refs.confirmDialog.openDialog({title:s,message:this.$tc("ADMINPANELWEBCLIENT.CONFIRM_DELETE_TENANT_PLURAL",t.length),okHandler:this.deleteTenants.bind(this,t)})}},deleteTenants:function(t){var e=this;this.deletingIds=t,this.loadingTenants=!0,d["a"].sendRequest({moduleName:"Core",methodName:"DeleteTenants",parameters:{IdList:t,DeletionConfirmedByAdmin:!0,TenantId:this.currentTenantId,Type:"Tenant"}}).then((function(n){if(e.deletingIds=[],e.loadingTenants=!1,!0===n){var a,s,i,o;l["a"].showReport(e.$tc("ADMINPANELWEBCLIENT.REPORT_DELETE_ENTITIES_TENANT_PLURAL",t.length));var c=-1!==t.indexOf(e.selectedTenantId),d=(null===(a=e.$refs)||void 0===a||null===(s=a.tenantList)||void 0===s?void 0:s.selectedPage)||1,h=e.tenants.length===t.length&&d>1;h&&r.a.isFunction(null===(i=e.$refs)||void 0===i||null===(o=i.tenantList)||void 0===o?void 0:o.decreasePage)?e.$refs.tenantList.decreasePage():c?(e.route(),e.populate()):e.populate()}else l["a"].showError(e.$tc("ADMINPANELWEBCLIENT.ERROR_DELETE_ENTITIES_TENANT_PLURAL",t.length));e.$store.dispatch("tenants/requestTenants")}),(function(n){e.deletingIds=[],e.loadingTenants=!1,l["a"].showError(o["a"].getTextFromResponse(n,e.$tc("ADMINPANELWEBCLIENT.ERROR_DELETE_ENTITIES_TENANT_PLURAL",t.length))),e.$store.dispatch("tenants/requestTenants")}))}}},P=O,W=n("8562"),M=n("65c6"),Q=n("05c0"),U=n("1c1c"),G=n("66e5"),z=n("4074"),j=n("0170"),F=n("eb85"),H=Object(N["a"])(P,a,s,!1,null,null,null);e["default"]=H.exports;w()(H,"components",{QSplitter:W["a"],QToolbar:M["a"],QBtn:L["a"],QTooltip:Q["a"],QList:U["a"],QItem:G["a"],QItemSection:z["a"],QItemLabel:j["a"],QSeparator:F["a"]})},"952a":function(t,e,n){"use strict";var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",version:"1.1",id:"svg17780",viewBox:"0 0 32 32.000001",height:"32",width:"32"}},[n("defs",{attrs:{id:"defs17782"}},[n("clipPath",{attrs:{clipPathUnits:"userSpaceOnUse",id:"clipPath5712"}},[n("path",{attrs:{d:"m 328,400.761 32,0 0,-32 -32,0 0,32 z",id:"path5714"}})])]),n("g",{attrs:{transform:"translate(0,-1020.3622)",id:"layer1"}},[n("path",{staticStyle:{"font-style":"normal","font-variant":"normal","font-weight":"normal","font-stretch":"normal","font-size":"medium","line-height":"normal","font-family":"sans-serif","text-indent":"0","text-align":"start","text-decoration":"none","text-decoration-line":"none","text-decoration-style":"solid","text-decoration-color":"#000000","letter-spacing":"normal","word-spacing":"normal","text-transform":"none",direction:"ltr","block-progression":"tb","writing-mode":"lr-tb","baseline-shift":"baseline","text-anchor":"start","white-space":"normal","clip-rule":"nonzero",display:"inline",overflow:"visible",visibility:"visible",opacity:"1",isolation:"auto","mix-blend-mode":"normal","color-interpolation":"sRGB","color-interpolation-filters":"linearRGB","solid-color":"#000000","solid-opacity":"1",fill:"#000000","fill-opacity":"1","fill-rule":"nonzero",stroke:"none","stroke-width":"1.25","stroke-linecap":"round","stroke-linejoin":"round","stroke-miterlimit":"10","stroke-dasharray":"none","stroke-dashoffset":"0","stroke-opacity":"1","color-rendering":"auto","image-rendering":"auto","shape-rendering":"auto","text-rendering":"auto","enable-background":"accumulate"},attrs:{id:"path6382",d:"m 14.435941,1024.3634 c -1.18946,0 -2.183383,0.866 -2.391999,1.9984 l -5.0449193,0 a 0.5000114,0.50002792 0 1 0 0,1 l 17.9986073,0 a 0.5000114,0.50002792 0 1 0 0,-1 l -5.044923,0 c -0.208376,-1.1322 -1.201211,-1.9984 -2.392007,-1.9984 l -3.124759,0 z m 0,1 3.124759,0 c 0.646894,0 1.180253,0.4176 1.363959,0.9984 l -5.851109,0 c 0.184562,-0.5802 0.717905,-0.9984 1.362391,-0.9984 z m 8.844629,3.053 a 0.5000114,0.50002792 0 0 0 -0.478083,0.4687 l -1.260838,16.6274 a 0.5000114,0.50002792 0 0 0 -0.0016,0.039 c 0,1.0572 -0.668485,1.8093 -1.360831,1.8093 l -8.360291,0 c -0.692346,0 -1.360831,-0.7523 -1.360831,-1.8093 a 0.5000114,0.50002792 0 0 0 -0.0016,-0.033 l -1.0592835,-16.3774 a 0.50020849,0.50022503 0 1 0 -0.9983629,0.064 l 1.0592942,16.3774 0,-0.031 c 0,1.493 0.9972482,2.8093 2.3607502,2.8093 l 8.360291,0 c 1.363495,0 2.360754,-1.3165 2.360754,-2.8093 l -0.0016,0.038 1.260838,-16.6274 a 0.5000114,0.50002792 0 0 0 -0.518712,-0.5453 z m -11.691281,1.939 a 0.5000114,0.50002792 0 0 0 -0.510896,0.5359 l 0.79681,13.4994 a 0.50006337,0.5000799 0 0 0 0.998363,-0.059 l -0.796819,-13.4994 a 0.5000114,0.50002792 0 0 0 -0.487458,-0.4765 z m 2.793536,0 a 0.5000114,0.50002792 0 0 0 -0.478091,0.5203 l 0.385907,13.4994 a 0.50015959,0.50017612 0 0 0 0.999922,-0.028 l -0.385906,-13.4994 a 0.5000114,0.50002792 0 0 0 -0.521832,-0.4922 z m 3.338799,0 a 0.5000114,0.50002792 0 0 0 -0.510897,0.4874 l -0.503081,13.4994 a 0.5000114,0.50002792 0 1 0 0.998355,0.038 l 0.503089,-13.4994 a 0.5000114,0.50002792 0 0 0 -0.487466,-0.525 z m 2.732605,0 a 0.5000114,0.50002792 0 0 0 -0.473404,0.4749 l -0.856182,13.4995 a 0.50020849,0.50022503 0 0 0 0.998363,0.064 l 0.854622,-13.4994 a 0.5000114,0.50002792 0 0 0 -0.523399,-0.539 z"}})])])},s=[],i={name:"Trash"},r=i,o=n("2877"),l=Object(o["a"])(r,a,s,!1,null,"0bff4d78",null);e["a"]=l.exports},"96ec":function(t,e,n){"use strict";var a=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("q-dialog",{attrs:{persistent:""},model:{value:t.confirm,callback:function(e){t.confirm=e},expression:"confirm"}},[n("q-card",{staticStyle:{"min-width":"300px"}},[n("q-card-section",{staticClass:"q-pb-none"},[n("div",{directives:[{name:"show",rawName:"v-show",value:t.title,expression:"title"}],staticClass:"text-h6"},[t._v(t._s(t.title))])]),n("q-card-section",[n("span",[t._v(t._s(t.message))])]),n("q-card-actions",{attrs:{align:"right"}},[n("q-btn",{staticClass:"q-px-sm",attrs:{unelevated:"","no-caps":"",dense:"",ripple:!1,color:"primary",label:t.$t("COREWEBCLIENT.ACTION_OK")},on:{click:t.proceed}}),n("q-btn",{staticClass:"q-px-sm",attrs:{unelevated:"","no-caps":"",dense:"",ripple:!1,color:"secondary",label:t.$t("COREWEBCLIENT.ACTION_CANCEL")},on:{click:t.cancel}})],1)],1)],1)},s=[],i=n("c973"),r=n.n(i),o=(n("96cf"),n("2ef0")),l=n.n(o),c=n("6bfe"),d={name:"ConfirmDialog",data:function(){return{title:"",message:"",confirm:!1,okHandler:null}},methods:{openDialog:function(){var t=r()(regeneratorRuntime.mark((function t(e){var n,a,s;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:n=e.title,a=e.message,s=e.okHandler,c["a"].isNonEmptyString(a)&&(this.title=n,this.message=a,this.confirm=!0,this.okHandler=s);case 2:case"end":return t.stop()}}),t,this)})));function e(e){return t.apply(this,arguments)}return e}(),proceed:function(){l.a.isFunction(this.okHandler)&&this.okHandler(),this.confirm=!1},cancel:function(){this.confirm=!1}}},h=d,u=n("2877"),p=n("24e8"),m=n("f09f"),f=n("a370"),T=n("4b7e"),g=n("9c40"),E=n("eebe"),v=n.n(E),I=Object(u["a"])(h,a,s,!1,null,"71c74599",null);e["a"]=I.exports;v()(I,"components",{QDialog:p["a"],QCard:m["a"],QCardSection:f["a"],QCardActions:T["a"],QBtn:g["a"]})}}]);