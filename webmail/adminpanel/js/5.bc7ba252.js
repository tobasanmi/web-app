(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[5],{"0449":function(e,t,s){"use strict";s("253f")},"051b":function(e,t,s){"use strict";s.r(t);var r=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("q-splitter",{staticClass:"full-height full-width",attrs:{"after-class":e.showTabs?"":"q-splitter__right-panel",limits:[10,30]},scopedSlots:e._u([{key:"before",fn:function(){return[s("div",{staticClass:"flex column full-height"},[s("q-toolbar",{staticClass:"col-auto q-py-sm list-border"},[s("div",{staticClass:"flex"},[s("q-btn",{attrs:{flat:"",color:"grey-8",size:"mg","no-wrap":"",disable:0===e.checkedIds.length},on:{click:e.askDeleteCheckedUsers}},[s("Trash"),s("span",[e._v(e._s(e.countLabel))]),s("q-tooltip",[e._v("\n              "+e._s(e.$t("COREWEBCLIENT.ACTION_DELETE"))+"\n            ")])],1),e.allowCreateUser?s("q-btn",{attrs:{flat:"",color:"grey-8",size:"mg"},on:{click:e.routeCreateUser}},[s("Add"),s("q-tooltip",[e._v("\n              "+e._s(e.$t("ADMINPANELWEBCLIENT.ACTION_CREATE_ENTITY_USER"))+"\n            ")])],1):e._e(),e._l(e.filters,(function(t){return s(t,{key:t.name,tag:"component",on:{"filter-selected":e.routeFilter,"filter-filled-up":e.populateFiltersGetParameters,"allow-create-user":e.handleAllowCreateUser}})}))],2)]),s("StandardList",{ref:"userList",staticClass:"col-grow list-border",attrs:{items:e.userItems,selectedItem:e.selectedUserId,loading:e.loadingUsers,totalCountText:e.totalCountText,search:e.search,page:e.page,pagesCount:e.pagesCount,noItemsText:"ADMINPANELWEBCLIENT.INFO_NO_ENTITIES_USER",noItemsFoundText:"ADMINPANELWEBCLIENT.INFO_NO_ENTITIES_FOUND_USER"},on:{route:e.route,check:e.afterCheck}})],1)]},proxy:!0},{key:"after",fn:function(){return[e.showTabs?s("q-splitter",{staticClass:"full-height full-width",attrs:{"after-class":"q-splitter__right-panel",limits:[10,30]},scopedSlots:e._u([{key:"before",fn:function(){return[s("q-list",[s("div",[s("q-item",{class:""===e.selectedTab?"bg-selected-item":"",attrs:{clickable:""},on:{click:function(t){return e.route(e.selectedUserId)}}},[s("q-item-section",[s("q-item-label",{directives:[{name:"t",rawName:"v-t",value:"ADMINPANELWEBCLIENT.LABEL_COMMON_SETTINGS_TAB",expression:"'ADMINPANELWEBCLIENT.LABEL_COMMON_SETTINGS_TAB'"}],attrs:{lines:"1"}})],1)],1),s("q-separator")],1),e._l(e.tabs,(function(t){return s("div",{key:t.tabName},[s("q-item",{class:e.selectedTab===t.tabName?"bg-selected-item":"",attrs:{clickable:""},on:{click:function(s){return e.route(e.selectedUserId,t.tabName)}}},[s("q-item-section",[s("q-item-label",{attrs:{lines:"1"}},[e._v(e._s(e.$t(t.title)))])],1)],1),s("q-separator")],1)})),s("q-inner-loading",{staticStyle:{"justify-content":"flex-start"},attrs:{showing:e.deleting}},[s("q-linear-progress",{attrs:{query:""}})],1)],2)]},proxy:!0},{key:"after",fn:function(){return[s("router-view",{attrs:{deletingIds:e.deletingIds,createMode:e.createMode},on:{"no-user-found":e.handleNoUserFound,"user-created":e.handleCreateUser,"cancel-create":e.route,"delete-user":e.askDeleteUser}})]},proxy:!0}],null,!1,774505897),model:{value:e.tabsSplitterWidth,callback:function(t){e.tabsSplitterWidth=t},expression:"tabsSplitterWidth"}}):e._e(),e.showTabs?e._e():s("router-view",{attrs:{deletingIds:e.deletingIds,createMode:e.createMode},on:{"no-user-found":e.handleNoUserFound,"user-created":e.handleCreateUser,"cancel-create":e.route,"delete-user":e.askDeleteUser}})]},proxy:!0}]),model:{value:e.listSplitterWidth,callback:function(t){e.listSplitterWidth=t},expression:"listSplitterWidth"}},[s("ConfirmDialog",{ref:"confirmDialog"})],1)},a=[],n=s("c973"),i=s.n(n),o=(s("96cf"),s("ac1f"),s("841c"),s("1276"),s("7db0"),s("d81d"),s("159b"),s("4de4"),s("a15b"),s("2ef0")),l=s.n(o),c=s("4245"),d=s("21ac"),u=s("6bfe"),h=s("e539"),p=s("11cb"),m=s("0091"),f=s("83d6"),g=s("96ec"),I=s("2287"),v=s("2e52"),b=s("952a"),C={name:"Domains",components:{ConfirmDialog:g["a"],StandardList:I["a"],Add:v["a"],Trash:b["a"]},data:function(){return{users:[],selectedUserId:0,loadingUsers:!1,totalCount:0,search:"",page:1,limit:f["a"].getEntitiesPerPage(),userItems:[],checkedIds:[],allowCreateUser:!0,justCreatedId:0,deletingIds:[],tabs:[],selectedTab:"",listSplitterWidth:u["a"].pInt(localStorage.getItem("users-list-splitter-width"),20),tabsSplitterWidth:u["a"].pInt(localStorage.getItem("users-tabs-splitter-width"),20),filters:[],currentFiltersRoutes:{},filtersGetParameters:{}}},computed:{currentTenantId:function(){return this.$store.getters["tenants/getCurrentTenantId"]},pagesCount:function(){return Math.ceil(this.totalCount/this.limit)},countLabel:function(){var e=this.checkedIds.length;return e>0?e:""},totalCountText:function(){return this.$tc("ADMINPANELWEBCLIENT.LABEL_USERS_COUNT",this.totalCount,{COUNT:this.totalCount})},showTabs:function(){return this.tabs.length>0&&this.selectedUserId>0},deleting:function(){return-1!==this.deletingIds.indexOf(this.selectedUserId)},createMode:function(){var e=this.$route.path.indexOf("/create");return-1!==e&&e===this.$route.path.length-7}},watch:{currentTenantId:function(){"/users"!==this.$route.path&&this.route(),this.populate()},$route:function(e,t){if(this.createMode)this.selectedUserId=0;else{var s,r,a,n,i,o,l=u["a"].pString(null===(s=this.$route)||void 0===s||null===(r=s.params)||void 0===r?void 0:r.search),c=u["a"].pPositiveInt(null===(a=this.$route)||void 0===a||null===(n=a.params)||void 0===n?void 0:n.page);this.search===l&&this.page===c&&0===this.justCreatedId||(this.search=l,this.page=c,this.populate());var d=u["a"].pNonNegativeInt(null===(i=this.$route)||void 0===i||null===(o=i.params)||void 0===o?void 0:o.id);this.selectedUserId!==d&&(this.selectedUserId=d);var h=this.$route.path.split("/"),p=h.length>0?h[h.length-1]:"",m=this.tabs.find((function(e){return e.tabName===p}));this.selectedTab=m?m.tabName:""}},users:function(){this.userItems=this.users.map((function(e){return{id:e.id,title:e.publicId,checked:!1}}))},allowCreateUser:function(){!this.allowCreateUser&&this.createMode&&this.$router.push("/users")},listSplitterWidth:function(e){localStorage.setItem("users-list-splitter-width",e)},tabsSplitterWidth:function(e){localStorage.setItem("users-tabs-splitter-width",e)}},mounted:function(){var e=this;return i()(regeneratorRuntime.mark((function t(){return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.populateFilters();case 2:e.populateTabs(),e.populate();case 4:case"end":return t.stop()}}),t)})))()},methods:{handleAllowCreateUser:function(e){e.tenantId===this.currentTenantId&&(this.allowCreateUser=e.allowCreateUser)},populateFilters:function(){var e=this;return i()(regeneratorRuntime.mark((function t(){return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,m["a"].getFiltersForUsers();case 2:e.filters=t.sent;case 3:case"end":return t.stop()}}),t)})))()},populateTabs:function(){var e=this,t=[];this.tabs=m["a"].getAdminUserTabs(),l.a.each(this.tabs,(function(s){u["a"].isNonEmptyArray(s.paths)?s.paths.forEach((function(r){e.$router.addRoute("users",{path:r,component:s.component}),t.push({path:r,component:s.component})})):(e.$router.addRoute("users",{path:s.tabName,component:s.component}),t.push({path:s.tabName,component:s.component}))})),t.forEach((function(t){e.filters.forEach((function(s){e.$router.addRoute("users",{path:s.filterRoute+"/"+t.path,component:t.component})}))}))},populateFiltersGetParameters:function(e){var t=l.a.extend(l.a.clone(this.filtersGetParameters),e);l.a.isEqual(t,this.filtersGetParameters)||(this.filtersGetParameters=t,this.populate())},populate:function(){var e=this;this.loadingUsers=!0,p["a"].getUsers(this.currentTenantId,this.filtersGetParameters,this.search,this.page,this.limit).then((function(t){var s=t.users,r=t.totalCount,a=t.tenantId,n=t.filtersGetParameters,i=void 0===n?{}:n,o=t.page,c=void 0===o?1:o,d=t.search,u=void 0===d?"":d;a===e.currentTenantId&&l.a.isEqual(i,e.filtersGetParameters)&&c===e.page&&u===e.search&&(e.users=s,e.totalCount=r,e.loadingUsers=!1,e.justCreatedId&&s.find((function(t){return t.id===e.justCreatedId}))&&(e.route(e.justCreatedId),e.justCreatedId=0))}))},getFiltersRoute:function(){var e=l.a.map(this.currentFiltersRoutes,(function(e,t){return void 0!==e?t+"/"+e:""})),t=l.a.filter(e,(function(e){return""!==e}));return t.length>0?"/"+t.join("/"):""},routeFilter:function(e){this.currentFiltersRoutes[e.routeName]=e.routeValue,this.route()},route:function(){var e,t,s,r,a=arguments.length>0&&void 0!==arguments[0]?arguments[0]:0,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"",i=(null===(e=this.$refs)||void 0===e||null===(t=e.userList)||void 0===t?void 0:t.enteredSearch)||"",o=""!==i?"/search/".concat(i):"",l=(null===(s=this.$refs)||void 0===s||null===(r=s.userList)||void 0===r?void 0:r.selectedPage)||1;this.search!==i&&(l=1);var c=l>1?"/page/".concat(l):"",d=a>0?"/id/".concat(a):"",u=""!==n?"/".concat(n):"",h="/users"+this.getFiltersRoute()+o+c+d+u;h!==this.$route.path&&this.$router.push(h)},routeCreateUser:function(){this.$router.push("/users"+this.getFiltersRoute()+"/create")},handleCreateUser:function(e){this.justCreatedId=e,this.route(),this.populate()},afterCheck:function(e){this.checkedIds=e},handleNoUserFound:function(){d["a"].showError(this.$t("ADMINPANELWEBCLIENT.ERROR_USER_NOT_FOUND")),this.route(),this.populate()},askDeleteUser:function(e){this.askDeleteUsers([e])},askDeleteCheckedUsers:function(){this.askDeleteUsers(this.checkedIds)},askDeleteUsers:function(e){var t,s;if(l.a.isFunction(null===this||void 0===this||null===(t=this.$refs)||void 0===t||null===(s=t.confirmDialog)||void 0===s?void 0:s.openDialog)){var r=1===e.length?this.users.find((function(t){return t.id===e[0]})):null,a=r?r.publicId:"";this.$refs.confirmDialog.openDialog({title:a,message:this.$tc("ADMINPANELWEBCLIENT.CONFIRM_DELETE_USER_PLURAL",e.length),okHandler:this.deleteUsers.bind(this,e)})}},deleteUsers:function(e){var t=this;this.deletingIds=e,this.loadingUsers=!0,h["a"].sendRequest({moduleName:"Core",methodName:"DeleteUsers",parameters:{IdList:e,DeletionConfirmedByAdmin:!0}}).then((function(s){if(t.deletingIds=[],t.loadingUsers=!1,!0===s){var r,a,n,i;d["a"].showReport(t.$tc("ADMINPANELWEBCLIENT.REPORT_DELETE_ENTITIES_USER_PLURAL",e.length));var o=-1!==e.indexOf(t.selectedUserId),c=(null===(r=t.$refs)||void 0===r||null===(a=r.userList)||void 0===a?void 0:a.selectedPage)||1,u=t.users.length===e.length&&c>1;u&&l.a.isFunction(null===(n=t.$refs)||void 0===n||null===(i=n.userList)||void 0===i?void 0:i.decreasePage)?t.$refs.userList.decreasePage():o?(t.route(),t.populate()):t.populate()}else d["a"].showError(t.$tc("ADMINPANELWEBCLIENT.ERROR_DELETE_ENTITIES_USER_PLURAL",e.length))}),(function(s){t.deletingIds=[],t.loadingUsers=!1,d["a"].showError(c["a"].getTextFromResponse(s,t.$tc("ADMINPANELWEBCLIENT.ERROR_DELETE_ENTITIES_USER_PLURAL",e.length)))}))}}},E=C,k=s("2877"),_=s("8562"),x=s("65c6"),N=s("9c40"),T=s("05c0"),w=s("1c1c"),L=s("66e5"),S=s("4074"),U=s("0170"),q=s("eb85"),y=s("74f7"),A=s("6b1d"),R=s("eebe"),P=s.n(R),$=Object(k["a"])(E,r,a,!1,null,null,null);t["default"]=$.exports;P()($,"components",{QSplitter:_["a"],QToolbar:x["a"],QBtn:N["a"],QTooltip:T["a"],QList:w["a"],QItem:L["a"],QItemSection:S["a"],QItemLabel:U["a"],QSeparator:q["a"],QInnerLoading:y["a"],QLinearProgress:A["a"]})},2287:function(e,t,s){"use strict";var r=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"flex column"},[s("q-list",{staticClass:"col-auto bg-grey-3"},[s("q-item",[s("q-item-section",{attrs:{side:""}},[s("q-checkbox",{attrs:{dense:""},model:{value:e.hasCheckedItems,callback:function(t){e.hasCheckedItems=t},expression:"hasCheckedItems"}})],1),s("q-item-section",[s("q-input",{attrs:{rounded:"",outlined:"",dense:"",autocomplete:"off"},on:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.startSearch(t)}},scopedSlots:e._u([{key:"append",fn:function(){return[s("q-icon",{staticClass:"q-btn-search search",attrs:{flat:"",ripple:!1,dense:"",name:"search"},on:{click:e.startSearch}})]},proxy:!0}]),model:{value:e.enteredSearch,callback:function(t){e.enteredSearch=t},expression:"enteredSearch"}})],1)],1),s("q-separator")],1),s("q-inner-loading",{staticStyle:{position:"relative","min-height":"4px"},attrs:{showing:e.loading}},[s("q-linear-progress",{attrs:{query:""}})],1),s("q-scroll-area",{staticClass:"col-grow relative-position"},[e.search?s("div",{staticClass:"text-right"},[s("q-btn",{staticClass:"no-hover q-mr-sm",attrs:{dense:"",flat:"","no-caps":"",color:"primary",label:e.$t("COREWEBCLIENT.ACTION_CLEAR_SEARCH")},nativeOn:{click:function(t){return t.stopPropagation(),e.clearSearch(t)}}})],1):e._e(),e.search?s("div",{staticClass:"text-center text-h6 text-grey-5 text-weight-regular"},[e._v("\n      "+e._s(e.$tc("ADMINPANELWEBCLIENT.INFO_SEARCH_RESULT",e.search,{SEARCH:e.search}))+"\n    ")]):e._e(),e.loading||0!==e.items.length||e.search?e._e():s("div",{staticClass:"q-ma-md text-center text-h6 text-grey-5 text-weight-regular"},[e._v("\n      "+e._s(e.$t(e.noItemsText))+"\n    ")]),!e.loading&&0===e.items.length&&e.search?s("div",{staticClass:"q-ma-md text-center text-h6 text-grey-5 text-weight-regular"},[e._v("\n      "+e._s(e.$t(e.noItemsFoundText))+"\n    ")]):e._e(),s("q-list",e._l(e.items,(function(t){return s("div",{key:t.id},[s("q-item",{class:e.getCssClass(t.id,t.checked),attrs:{clickable:""},on:{click:function(s){return e.selectItem(t.id)}}},[s("q-item-section",{attrs:{side:""}},[s("q-checkbox",{attrs:{dense:""},model:{value:t.checked,callback:function(s){e.$set(t,"checked",s)},expression:"item.checked"}})],1),s("q-item-section",[s("q-item-label",{attrs:{lines:"1"}},[e._v(e._s(t.title))])],1),void 0!==t.rightText?s("q-item-section",{attrs:{side:""}},[s("q-item-label",{attrs:{lines:"1"}},[e._v(e._s(t.rightText))])],1):e._e()],1),s("q-separator")],1)})),0)],1),e.totalCountText||e.pagesCount>1?s("q-list",{staticClass:"col-auto"},[s("q-separator"),s("q-item",[s("q-item-section",[s("span",[e._v(e._s(e.totalCountText))])]),e.pagesCount>1?s("q-item-section",{attrs:{side:""}},[s("q-pagination",{attrs:{flat:"","boundary-links":e.pagesCount>5,"max-pages":5,"boundary-numbers":!1,"active-color":"primary",color:"grey-6",max:e.pagesCount},model:{value:e.selectedPage,callback:function(t){e.selectedPage=t},expression:"selectedPage"}})],1):e._e()],1),s("q-separator")],1):e._e()],1)},a=[],n=(s("a9e3"),s("4de4"),s("d81d"),s("ac1f"),s("841c"),s("159b"),{name:"StandardList",props:{items:Array,selectedItem:Number,loading:Boolean,totalCountText:String,search:String,page:Number,pagesCount:Number,noItemsText:String,noItemsFoundText:String},data:function(){return{hasCheckedItems:!1,enteredSearch:"",selectedPage:1}},computed:{checkedIds:function(){var e=this.items.filter((function(e){return e.checked}));return e.map((function(e){return e.id}))}},watch:{search:function(){this.enteredSearch=this.search},selectedPage:function(){this.$emit("route")},page:function(){this.selectedPage=this.page},checkedIds:function(){this.hasCheckedItems=this.checkedIds.length>0,this.$emit("check",this.checkedIds)},hasCheckedItems:function(){!1===this.hasCheckedItems&&this.checkedIds.length>0&&this.items.forEach((function(e){e.checked=!1})),!0===this.hasCheckedItems&&0===this.checkedIds.length&&this.items.forEach((function(e){e.checked=!0}))}},methods:{startSearch:function(){this.$emit("route")},clearSearch:function(){this.enteredSearch="",this.startSearch()},selectItem:function(e){this.$emit("route",e)},getCssClass:function(e,t){return this.selectedItem===e?"bg-selected-item":t?"bg-checked-item":""},decreasePage:function(){this.selectedPage-=1}}}),i=n,o=(s("0449"),s("2877")),l=s("1c1c"),c=s("66e5"),d=s("4074"),u=s("8f8e"),h=s("27f9"),p=s("0016"),m=s("9c40"),f=s("eb85"),g=s("74f7"),I=s("6b1d"),v=s("4983"),b=s("0170"),C=s("3b16"),E=s("eebe"),k=s.n(E),_=Object(o["a"])(i,r,a,!1,null,"3696b374",null);t["a"]=_.exports;k()(_,"components",{QList:l["a"],QItem:c["a"],QItemSection:d["a"],QCheckbox:u["a"],QInput:h["a"],QIcon:p["a"],QBtn:m["a"],QSeparator:f["a"],QInnerLoading:g["a"],QLinearProgress:I["a"],QScrollArea:v["a"],QItemLabel:b["a"],QPagination:C["a"]})},"253f":function(e,t,s){},"2e52":function(e,t,s){"use strict";var r=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",version:"1.1",id:"svg4258",viewBox:"0 0 32 32.000001",height:"32",width:"32"}},[s("defs",{attrs:{id:"defs4260"}},[s("clipPath",{attrs:{id:"clipPath1830-4",clipPathUnits:"userSpaceOnUse"}},[s("path",{attrs:{id:"path1832-0",d:"m 97,434 32,0 0,-32 -32,0 0,32 z"}})])]),s("g",{attrs:{transform:"translate(0,-1020.3622)",id:"layer1"}},[s("path",{staticStyle:{"font-style":"normal","font-variant":"normal","font-weight":"normal","font-stretch":"normal","font-size":"medium","line-height":"normal","font-family":"sans-serif","text-indent":"0","text-align":"start","text-decoration":"none","text-decoration-line":"none","text-decoration-style":"solid","text-decoration-color":"#000000","letter-spacing":"normal","word-spacing":"normal","text-transform":"none",direction:"ltr","block-progression":"tb","writing-mode":"lr-tb","baseline-shift":"baseline","text-anchor":"start","white-space":"normal","clip-rule":"nonzero",display:"inline",overflow:"visible",visibility:"visible",opacity:"1",isolation:"auto","mix-blend-mode":"normal","color-interpolation":"sRGB","color-interpolation-filters":"linearRGB","solid-color":"#000000","solid-opacity":"1",fill:"#000000","fill-opacity":"1","fill-rule":"nonzero",stroke:"none","stroke-width":"1","stroke-linecap":"round","stroke-linejoin":"round","stroke-miterlimit":"10","stroke-dasharray":"none","stroke-dashoffset":"0","stroke-opacity":"1","color-rendering":"auto","image-rendering":"auto","shape-rendering":"auto","text-rendering":"auto","enable-background":"accumulate"},attrs:{id:"path2552",transform:"translate(0,1020.3622)",d:"M 15.492188 5.4941406 A 0.50005 0.50005 0 0 0 15 6 L 15 15 L 6 15 A 0.50005 0.50005 0 1 0 6 16 L 15 16 L 15 25 A 0.50005 0.50005 0 1 0 16 25 L 16 16 L 25 16 A 0.50005 0.50005 0 1 0 25 15 L 16 15 L 16 6 A 0.50005 0.50005 0 0 0 15.492188 5.4941406 z "}})])])},a=[],n={name:"Add"},i=n,o=s("2877"),l=Object(o["a"])(i,r,a,!1,null,"7028338a",null);t["a"]=l.exports},"952a":function(e,t,s){"use strict";var r=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",version:"1.1",id:"svg17780",viewBox:"0 0 32 32.000001",height:"32",width:"32"}},[s("defs",{attrs:{id:"defs17782"}},[s("clipPath",{attrs:{clipPathUnits:"userSpaceOnUse",id:"clipPath5712"}},[s("path",{attrs:{d:"m 328,400.761 32,0 0,-32 -32,0 0,32 z",id:"path5714"}})])]),s("g",{attrs:{transform:"translate(0,-1020.3622)",id:"layer1"}},[s("path",{staticStyle:{"font-style":"normal","font-variant":"normal","font-weight":"normal","font-stretch":"normal","font-size":"medium","line-height":"normal","font-family":"sans-serif","text-indent":"0","text-align":"start","text-decoration":"none","text-decoration-line":"none","text-decoration-style":"solid","text-decoration-color":"#000000","letter-spacing":"normal","word-spacing":"normal","text-transform":"none",direction:"ltr","block-progression":"tb","writing-mode":"lr-tb","baseline-shift":"baseline","text-anchor":"start","white-space":"normal","clip-rule":"nonzero",display:"inline",overflow:"visible",visibility:"visible",opacity:"1",isolation:"auto","mix-blend-mode":"normal","color-interpolation":"sRGB","color-interpolation-filters":"linearRGB","solid-color":"#000000","solid-opacity":"1",fill:"#000000","fill-opacity":"1","fill-rule":"nonzero",stroke:"none","stroke-width":"1.25","stroke-linecap":"round","stroke-linejoin":"round","stroke-miterlimit":"10","stroke-dasharray":"none","stroke-dashoffset":"0","stroke-opacity":"1","color-rendering":"auto","image-rendering":"auto","shape-rendering":"auto","text-rendering":"auto","enable-background":"accumulate"},attrs:{id:"path6382",d:"m 14.435941,1024.3634 c -1.18946,0 -2.183383,0.866 -2.391999,1.9984 l -5.0449193,0 a 0.5000114,0.50002792 0 1 0 0,1 l 17.9986073,0 a 0.5000114,0.50002792 0 1 0 0,-1 l -5.044923,0 c -0.208376,-1.1322 -1.201211,-1.9984 -2.392007,-1.9984 l -3.124759,0 z m 0,1 3.124759,0 c 0.646894,0 1.180253,0.4176 1.363959,0.9984 l -5.851109,0 c 0.184562,-0.5802 0.717905,-0.9984 1.362391,-0.9984 z m 8.844629,3.053 a 0.5000114,0.50002792 0 0 0 -0.478083,0.4687 l -1.260838,16.6274 a 0.5000114,0.50002792 0 0 0 -0.0016,0.039 c 0,1.0572 -0.668485,1.8093 -1.360831,1.8093 l -8.360291,0 c -0.692346,0 -1.360831,-0.7523 -1.360831,-1.8093 a 0.5000114,0.50002792 0 0 0 -0.0016,-0.033 l -1.0592835,-16.3774 a 0.50020849,0.50022503 0 1 0 -0.9983629,0.064 l 1.0592942,16.3774 0,-0.031 c 0,1.493 0.9972482,2.8093 2.3607502,2.8093 l 8.360291,0 c 1.363495,0 2.360754,-1.3165 2.360754,-2.8093 l -0.0016,0.038 1.260838,-16.6274 a 0.5000114,0.50002792 0 0 0 -0.518712,-0.5453 z m -11.691281,1.939 a 0.5000114,0.50002792 0 0 0 -0.510896,0.5359 l 0.79681,13.4994 a 0.50006337,0.5000799 0 0 0 0.998363,-0.059 l -0.796819,-13.4994 a 0.5000114,0.50002792 0 0 0 -0.487458,-0.4765 z m 2.793536,0 a 0.5000114,0.50002792 0 0 0 -0.478091,0.5203 l 0.385907,13.4994 a 0.50015959,0.50017612 0 0 0 0.999922,-0.028 l -0.385906,-13.4994 a 0.5000114,0.50002792 0 0 0 -0.521832,-0.4922 z m 3.338799,0 a 0.5000114,0.50002792 0 0 0 -0.510897,0.4874 l -0.503081,13.4994 a 0.5000114,0.50002792 0 1 0 0.998355,0.038 l 0.503089,-13.4994 a 0.5000114,0.50002792 0 0 0 -0.487466,-0.525 z m 2.732605,0 a 0.5000114,0.50002792 0 0 0 -0.473404,0.4749 l -0.856182,13.4995 a 0.50020849,0.50022503 0 0 0 0.998363,0.064 l 0.854622,-13.4994 a 0.5000114,0.50002792 0 0 0 -0.523399,-0.539 z"}})])])},a=[],n={name:"Trash"},i=n,o=s("2877"),l=Object(o["a"])(i,r,a,!1,null,"0bff4d78",null);t["a"]=l.exports},"96ec":function(e,t,s){"use strict";var r=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("q-dialog",{attrs:{persistent:""},model:{value:e.confirm,callback:function(t){e.confirm=t},expression:"confirm"}},[s("q-card",{staticStyle:{"min-width":"300px"}},[s("q-card-section",{staticClass:"q-pb-none"},[s("div",{directives:[{name:"show",rawName:"v-show",value:e.title,expression:"title"}],staticClass:"text-h6"},[e._v(e._s(e.title))])]),s("q-card-section",[s("span",[e._v(e._s(e.message))])]),s("q-card-actions",{attrs:{align:"right"}},[s("q-btn",{staticClass:"q-px-sm",attrs:{unelevated:"","no-caps":"",dense:"",ripple:!1,color:"primary",label:e.$t("COREWEBCLIENT.ACTION_OK")},on:{click:e.proceed}}),s("q-btn",{staticClass:"q-px-sm",attrs:{unelevated:"","no-caps":"",dense:"",ripple:!1,color:"secondary",label:e.$t("COREWEBCLIENT.ACTION_CANCEL")},on:{click:e.cancel}})],1)],1)],1)},a=[],n=s("c973"),i=s.n(n),o=(s("96cf"),s("2ef0")),l=s.n(o),c=s("6bfe"),d={name:"ConfirmDialog",data:function(){return{title:"",message:"",confirm:!1,okHandler:null}},methods:{openDialog:function(){var e=i()(regeneratorRuntime.mark((function e(t){var s,r,a;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:s=t.title,r=t.message,a=t.okHandler,c["a"].isNonEmptyString(r)&&(this.title=s,this.message=r,this.confirm=!0,this.okHandler=a);case 2:case"end":return e.stop()}}),e,this)})));function t(t){return e.apply(this,arguments)}return t}(),proceed:function(){l.a.isFunction(this.okHandler)&&this.okHandler(),this.confirm=!1},cancel:function(){this.confirm=!1}}},u=d,h=s("2877"),p=s("24e8"),m=s("f09f"),f=s("a370"),g=s("4b7e"),I=s("9c40"),v=s("eebe"),b=s.n(v),C=Object(h["a"])(u,r,a,!1,null,"71c74599",null);t["a"]=C.exports;b()(C,"components",{QDialog:p["a"],QCard:m["a"],QCardSection:f["a"],QCardActions:g["a"],QBtn:I["a"]})}}]);