(this["webpackJsonpcroma-pdp-app"]=this["webpackJsonpcroma-pdp-app"]||[]).push([[58],{1089:function(e,t,o){"use strict";o.r(t),o.d(t,"HomeCmsComponent",(function(){return Y})),o.d(t,"mapStateToProps",(function(){return J})),o.d(t,"mapDispatchToProps",(function(){return V}));var r=o(0),i=o.n(r),a=o(31),n=o(40),l=o(562),c=o(348),d=o(563),m=o(564),s=o(565),g=o(471),u=o(349),b=o(566),F=o(350),p=o(38),T=o(440),C=o(387),M=o(134),k=o.n(M),A=o(438);function D(e){return i.a.createElement(A.a,Object.assign({elevation:6,variant:"filled"},e))}var v=Object(r.forwardRef)((e,t)=>{const[o,a]=i.a.useState(!1),n=()=>{a(!0)};Object(r.useImperativeHandle)(t,()=>({openToast:n}));const l=(e,t)=>{"clickaway"!==t&&a(!1)};try{return i.a.createElement(i.a.Fragment,null,i.a.createElement(T.a,{anchorOrigin:{vertical:"bottom",horizontal:"center"},open:o,autoHideDuration:3e3,onClose:l},i.a.createElement(D,{icon:"success"===e.varient?i.a.createElement("img",{src:"/assets/images/greentick.svg",className:"verify-tick-toast",alt:""}):i.a.createElement("img",{src:"/assets/images/redmark.svg",className:"cross-tick-toast",alt:""}),onClose:l,severity:e.varient,action:i.a.createElement(i.a.Fragment,null,i.a.createElement(C.a,{size:"medium","aria-label":"close",color:"inherit",onClick:l},i.a.createElement(k.a,{fontSize:"success"===e.varient?"large":"small"})))},e.msg)))}catch(c){return console.log(c),i.a.createElement(i.a.Fragment,null," ")}}),S=o(144),O=o(29),E=o(82),h=o(77),f=o(99),G=o(118),y=o(14);const x=Object(p.a)(()=>o.e(12).then(o.bind(null,1029))),N=Object(p.a)(()=>o.e(1).then(o.bind(null,1085))),P=i.a.memo(l.a),R=i.a.memo(c.a),B=i.a.memo(d.a),w=i.a.memo(m.a),I=i.a.memo(s.a),_=i.a.memo(g.a),L=i.a.memo(N),U=i.a.memo(u.a),j=i.a.memo(x),z=i.a.memo(E.a),H=i.a.memo(h.a),W=i.a.memo(f.a),K=i.a.memo(G.a),Y=e=>{let{fetchWishListData:t,homeData:o,deviceType:a,fetchListProduct:n,updateHomePageInView:l,carousalData:c,isFetching:d,fetchHomeData:m,signInToken:s,fetchAndInitializeObserverArray:g,observerArray:u,fetchPriceList:p,callMsdAPIstate:T,modalOpenFlag:C}=e;const M=Object(r.useRef)(null),[k]=Object(O.a)(),[A,D]=Object(r.useState)(""),[E,h]=Object(r.useState)("");let f=[];const G=(e,t)=>{D(t),h(e),M&&M.current&&M.current.openToast()};Object(r.useEffect)(()=>{l()},[]),Object(r.useEffect)(()=>{s&&x()},[s]);const x=()=>{const e=JSON.parse(localStorage.getItem("cr-cache:user-data")),o=localStorage.getItem("access_token");e&&Object.keys(e).length&&o&&t()};Object(r.useEffect)(()=>{o||m()},[]),Object(r.useEffect)(()=>{if(o&&null===c){var e;void 0===u&&g();let t=[];if(f&&Array.isArray(f)&&f.length>0&&f.forEach(e=>{const{effect:o,typeCode:r,sortedProductCodes:i}=e;o===y.a.HYB_PRODUCT&&r===y.f.PRODUCT_CAROUSEL_COMPONENT&&(t=t.concat(i))}),t&&Array.isArray(t)&&(null===(e=t)||void 0===e?void 0:e.length)>0){let e=[...new Set(t)];n(e);let o=e.join(",");p(o)}}},[o]);if(d)return i.a.createElement("div",null);if(o){var N,Y,J,V;const e=o&&(null===o||void 0===o?void 0:o.contentSlots)&&(null===o||void 0===o||null===(N=o.contentSlots)||void 0===N?void 0:N.contentSlot)&&Array.isArray(null===o||void 0===o||null===(Y=o.contentSlots)||void 0===Y?void 0:Y.contentSlot)&&(null===o||void 0===o||null===(J=o.contentSlots)||void 0===J?void 0:J.contentSlot.find(e=>"PWAHomePage1"===(null===e||void 0===e?void 0:e.position)));return f=null===e||void 0===e||null===(V=e.components)||void 0===V?void 0:V.component,i.a.createElement(i.a.Fragment,null,(()=>{if(f&&Array.isArray(f)){let e=4;return f.findIndex((t,o)=>{const{name:r}=t;return r&&"string"===typeof r&&"HIGHLIGHTS"===r.toUpperCase()&&(e=o),null}),f.map((e,t)=>{const{effect:r,typeCode:n,uid:l,bannerList:c,effectTypeForDesktop:d,subtitleForDesktop:m,effectTypeForMobile:g,mobileBannerList:u,name:p,showTitleForMobile:M,title:A,subtitleForMobile:D,showSubtitleForMobile:v,titleForMobile:O,content:E,showSubtitleForDesktop:h,scrollAnimationForMobile:f,numberOfColumnForMobile:x,numberOfRowsForMobile:N,titleForDesktop:Y,showTitleForDesktop:J,scrollAnimationForDesktop:V,numberOfColumnForDesktop:q}=e;return i.a.createElement(i.a.Fragment,{key:t},n===y.f.PRODUCT_CAROUSEL_COMPONENT&&i.a.createElement(i.a.Fragment,null,T&&i.a.createElement(i.a.Fragment,null,r===y.a.PRODUCT&&i.a.createElement(L,{signInToken:s,recName:p,showToastMsg:G,name:"".concat(l).concat(t),title:A,data:e,deviceType:a}),r===y.a.DEALS&&i.a.createElement(I,{signInToken:s,recName:p,uid:l,name:"".concat(l).concat(t),titleName:A,data:e,deviceType:a}),r===y.a.IMAGE&&i.a.createElement(R,{signInToken:s,recName:p,name:"".concat(l).concat(t),titleName:A,data:e,deviceType:a}),r===y.a.CATEGORY&&i.a.createElement(B,{signInToken:s,recName:p,name:"".concat(l).concat(t),titleName:A,data:e,deviceType:a})),r===y.a.HYB_PRODUCT&&i.a.createElement(j,{showToastMsg:G,recName:p,name:"".concat(l).concat(t),title:A,data:e,deviceType:a,uid:l})),n===y.f.ROTATING_IMAGES_COMPONENT&&i.a.createElement(i.a.Fragment,null,r===y.a.FULL&&i.a.createElement(b.a,{signInToken:s,dataList:c,name:"".concat(l).concat(t),titleName:p,count:null===c||void 0===c?void 0:c.length,uid:l,data:e,deviceType:a}),r===y.a.TURNDOWN&&c&&Array.isArray(c)&&(null===c||void 0===c?void 0:c.length)>0&&i.a.createElement(_,{items:c,headingTitle:A,title:p,name:"".concat(l).concat(t),count:null===c||void 0===c?void 0:c.length,uid:l,data:e,deviceType:a}),(r===y.a.SPLIT2||r===y.a.SPLIT4)&&i.a.createElement(S.a,{rotatingData:e,page:"homepage",name:p}),r===y.a.CURTAINX&&c&&Array.isArray(c)&&(null===c||void 0===c?void 0:c.length)>0&&i.a.createElement(w,{dataList:c,name:"".concat(l).concat(t),titleName:p,count:null===c||void 0===c?void 0:c.length,uid:l,data:e,deviceType:a})),n===y.f.CMS_PARAGRAPH_COMPONENT&&E&&i.a.createElement("div",{className:"home-page-footer-content",dangerouslySetInnerHTML:{__html:E||""}}),l===y.g.WELCOME_GUEST_COMPONENT&&i.a.createElement(P,null),l===y.g.WHY_THINK_CROMA_COMPONENT&&i.a.createElement(U,{data:o,title:p,dataList:e,deviceType:a}),n===y.f.SIMPLE_BANNER_COMPONENT&&i.a.createElement(F.a,{data:e,deviceType:a}),k<768&&i.a.createElement(i.a.Fragment,null,n===y.f.ROTATING_IMAGES_COMPONENT&&r===y.a.FEATURE_ICON&&c&&Array.isArray(c)&&(null===c||void 0===c?void 0:c.length)>0&&i.a.createElement(K,{aplus:!1,loop:!0,uid:l,banners:c,count:null===c||void 0===c?void 0:c.length,width:k,scrollAnimation:f,modalOpenFlag:C}),n===y.f.CROMA_PRODUCT_COLUMN_COMPONENT&&r===y.a.BANNER&&i.a.createElement(i.a.Fragment,null,g===y.b.STACK&&i.a.createElement(z,{width:k,subTitle:D&&D,showSubTitle:v&&v,title:O&&O,showTitle:M&&M,recName:p,numOfColumn:null===x||void 0===x?void 0:x.slice(1),name:"".concat(l).concat(t),data:e,items:u&&u,deviceType:a,titleColor:e.titleColorForMobile,subTitleColor:e.subtitleColorForMobile,uid:l,centerGap:e.imageCenterGapForMobile,titleAlignment:e.titleAlignmentForMobile,subtitleAlignment:e.subtitleAlignmentForMobile,cornerRadius:e.imageCornerRadiusForMobile,topMargin:e.imageTopMarginForMobile,bottomMargin:e.imageBottomMarginForMobile,showBackGround:e.isBackgroundEnableForMobile,backGroundImageData:e.mobileBackground,linearGradientColor1:e.backgroundGradientColor1ForMobile,linearGradientColor2:e.backgroundGradientColor2ForMobile,backgroundColorSolid:e.backgroundColorForMobile,gradientDirection:e.backgroundColorGradientTypeForMobile,activateTimer:e.activateTimerForMobile,textTimerOff:e.textFieldForContentWhenTimerGoesOffMobile,textSaleStartEnd:e.textFieldForSaleStartOrEndTextMobile,timerStart:o.serverDateTime,timerEnd:e.selectStartOrEndDateAndTimeMobile,timerAlignment:e.alignmentForTimerMobile,timercolor:e.colorOfTimerAndTextMobile,topPadding:e.textFieldForDynamicTopPaddingForBackgroundImageForMobile,headingName:p}),g===y.b.CAROUSEL&&u&&Array.isArray(u)&&(null===u||void 0===u?void 0:u.length)>0&&i.a.createElement(H,{width:k,subTitle:D&&D,showSubTitle:v&&v,title:O&&O,showTitle:M&&M,numOfColumn:null===x||void 0===x?void 0:x.slice(1),items:u&&u,name:"".concat(l).concat(t),count:null===u||void 0===u?void 0:u.length,uid:l,data:e,deviceType:a,lazyLoad:!1,centerGap:e.imageCenterGapForMobile,titleColor:e.titleColorForMobile,subTitleColor:e.subtitleColorForMobile,titleAlignment:e.titleAlignmentForMobile,subtitleAlignment:e.subtitleAlignmentForMobile,cornerRadius:e.imageCornerRadiusForMobile,topMargin:e.imageTopMarginForMobile,bottomMargin:e.imageBottomMarginForMobile,showBackGround:e.isBackgroundEnableForMobile,backGroundImageData:e.mobileBackground,linearGradientColor1:e.backgroundGradientColor1ForMobile,linearGradientColor2:e.backgroundGradientColor2ForMobile,backgroundColorSolid:e.backgroundColorForMobile,gradientDirection:e.backgroundColorGradientTypeForMobile,activateTimer:e.activateTimerForMobile,textTimerOff:e.textFieldForContentWhenTimerGoesOffMobile,textSaleStartEnd:e.textFieldForSaleStartOrEndTextMobile,timerStart:o.serverDateTime,timerEnd:e.selectStartOrEndDateAndTimeMobile,timerAlignment:e.alignmentForTimerMobile,timercolor:e.colorOfTimerAndTextMobile,topPadding:e.textFieldForDynamicTopPaddingForBackgroundImageForMobile,enableAutoScroll:e.enableAutoScrollMobile,autoScrollType:e.autoScrollMobile,headingName:p}),g===y.b.SCROLL_AND_STACK&&u&&Array.isArray(u)&&(null===u||void 0===u?void 0:u.length)>0&&i.a.createElement(W,{width:k,subTitle:D&&D,showSubTitle:v&&v,title:O&&O,showTitle:M&&M,numOfRow:N&&N,numOfColumn:null===x||void 0===x?void 0:x.slice(1),items:u&&u,name:"".concat(l).concat(t),count:null===c||void 0===c?void 0:c.length,uid:l,data:e,deviceType:a,lazyLoad:!1,centerGap:e.imageCenterGapForMobile,titleColor:e.titleColorForMobile,subTitleColor:e.subtitleColorForMobile,titleAlignment:e.titleAlignmentForMobile,subtitleAlignment:e.subtitleAlignmentForMobile,cornerRadius:e.imageCornerRadiusForMobile,topMargin:e.imageTopMarginForMobile,bottomMargin:e.imageBottomMarginForMobile,showBackGround:e.isBackgroundEnableForMobile,backGroundImageData:e.mobileBackground,linearGradientColor1:e.backgroundGradientColor1ForMobile,linearGradientColor2:e.backgroundGradientColor2ForMobile,backgroundColorSolid:e.backgroundColorForMobile,gradientDirection:e.backgroundColorGradientTypeForMobile,activateTimer:e.activateTimerForMobile,textTimerOff:e.textFieldForContentWhenTimerGoesOffMobile,textSaleStartEnd:e.textFieldForSaleStartOrEndTextMobile,timerStart:o.serverDateTime,timerEnd:e.selectStartOrEndDateAndTimeMobile,timerAlignment:e.alignmentForTimerMobile,timercolor:e.colorOfTimerAndTextMobile,topPadding:e.textFieldForDynamicTopPaddingForBackgroundImageForMobile,headingName:p})),n===y.f.CROMA_FEATURE_COLUMN_COMPONENT&&r===y.a.BANNER&&i.a.createElement(i.a.Fragment,null,g===y.b.STACK&&i.a.createElement(z,{width:k,subTitle:D&&D,showSubTitle:v&&v,title:O&&O,showTitle:M&&M,recName:p,numOfColumn:null===x||void 0===x?void 0:x.slice(1),name:"".concat(l).concat(t),data:e,items:u&&u,deviceType:a,titleColor:e.titleColorForMobile,subTitleColor:e.subtitleColorForMobile,uid:l,centerGap:e.imageCenterGapForMobile,titleAlignment:e.titleAlignmentForMobile,subtitleAlignment:e.subtitleAlignmentForMobile,cornerRadius:e.imageCornerRadiusForMobile,topMargin:e.imageTopMarginForMobile,bottomMargin:e.imageBottomMarginForMobile,showBackGround:e.isBackgroundEnableForMobile,backGroundImageData:e.mobileBackground,linearGradientColor1:e.backgroundGradientColor1ForMobile,linearGradientColor2:e.backgroundGradientColor2ForMobile,backgroundColorSolid:e.backgroundColorForMobile,gradientDirection:e.backgroundColorGradientTypeForMobile,activateTimer:e.activateTimerForMobile,textTimerOff:e.textFieldForContentWhenTimerGoesOffMobile,textSaleStartEnd:e.textFieldForSaleStartOrEndTextMobile,timerStart:o.serverDateTime,timerEnd:e.selectStartOrEndDateAndTimeMobile,timerAlignment:e.alignmentForTimerMobile,timercolor:e.colorOfTimerAndTextMobile,topPadding:e.textFieldForDynamicTopPaddingForBackgroundImageForMobile,contentBoxPlacement:e.contentBoxPlacementMobile,horizontalAlignmentForContentSpace:e.horizontalAlignmentForContentSpaceMobile,verticalAlignmentForContentSpace:e.verticalAlignmentForContentSpaceMobile,headingName:p}),g===y.b.CAROUSEL&&u&&Array.isArray(u)&&(null===u||void 0===u?void 0:u.length)>0&&i.a.createElement(H,{width:k,subTitle:D&&D,showSubTitle:v&&v,title:O&&O,showTitle:M&&M,numOfColumn:null===x||void 0===x?void 0:x.slice(1),items:u&&u,name:"".concat(l).concat(t),count:null===u||void 0===u?void 0:u.length,uid:l,data:e,deviceType:a,lazyLoad:!1,centerGap:e.imageCenterGapForMobile,titleColor:e.titleColorForMobile,subTitleColor:e.subtitleColorForMobile,titleAlignment:e.titleAlignmentForMobile,subtitleAlignment:e.subtitleAlignmentForMobile,cornerRadius:e.imageCornerRadiusForMobile,topMargin:e.imageTopMarginForMobile,bottomMargin:e.imageBottomMarginForMobile,showBackGround:e.isBackgroundEnableForMobile,backGroundImageData:e.mobileBackground,linearGradientColor1:e.backgroundGradientColor1ForMobile,linearGradientColor2:e.backgroundGradientColor2ForMobile,backgroundColorSolid:e.backgroundColorForMobile,gradientDirection:e.backgroundColorGradientTypeForMobile,activateTimer:e.activateTimerForMobile,textTimerOff:e.textFieldForContentWhenTimerGoesOffMobile,textSaleStartEnd:e.textFieldForSaleStartOrEndTextMobile,timerStart:o.serverDateTime,timerEnd:e.selectStartOrEndDateAndTimeMobile,timerAlignment:e.alignmentForTimerMobile,timercolor:e.colorOfTimerAndTextMobile,topPadding:e.textFieldForDynamicTopPaddingForBackgroundImageForMobile,enableAutoScroll:e.enableAutoScrollMobile,autoScrollType:e.autoScrollMobile,contentBoxPlacement:e.contentBoxPlacementMobile,horizontalAlignmentForContentSpace:e.horizontalAlignmentForContentSpaceMobile,verticalAlignmentForContentSpace:e.verticalAlignmentForContentSpaceMobile}),g===y.b.SCROLL_AND_STACK&&u&&Array.isArray(u)&&(null===u||void 0===u?void 0:u.length)>0&&i.a.createElement(W,{width:k,subTitle:D&&D,showSubTitle:v&&v,title:O&&O,showTitle:M&&M,numOfRow:N&&N,numOfColumn:null===x||void 0===x?void 0:x.slice(1),items:u&&u,name:"".concat(l).concat(t),count:null===c||void 0===c?void 0:c.length,uid:l,data:e,deviceType:a,lazyLoad:!1,centerGap:e.imageCenterGapForMobile,titleColor:e.titleColorForMobile,subTitleColor:e.subtitleColorForMobile,titleAlignment:e.titleAlignmentForMobile,subtitleAlignment:e.subtitleAlignmentForMobile,cornerRadius:e.imageCornerRadiusForMobile,topMargin:e.imageTopMarginForMobile,bottomMargin:e.imageBottomMarginForMobile,showBackGround:e.isBackgroundEnableForMobile,backGroundImageData:e.mobileBackground,linearGradientColor1:e.backgroundGradientColor1ForMobile,linearGradientColor2:e.backgroundGradientColor2ForMobile,backgroundColorSolid:e.backgroundColorForMobile,gradientDirection:e.backgroundColorGradientTypeForMobile,activateTimer:e.activateTimerForMobile,textTimerOff:e.textFieldForContentWhenTimerGoesOffMobile,textSaleStartEnd:e.textFieldForSaleStartOrEndTextMobile,timerStart:o.serverDateTime,timerEnd:e.selectStartOrEndDateAndTimeMobile,timerAlignment:e.alignmentForTimerMobile,timercolor:e.colorOfTimerAndTextMobile,topPadding:e.textFieldForDynamicTopPaddingForBackgroundImageForMobile,contentBoxPlacement:e.contentBoxPlacementMobile,horizontalAlignmentForContentSpace:e.horizontalAlignmentForContentSpaceMobile,verticalAlignmentForContentSpace:e.verticalAlignmentForContentSpaceMobile}))),k>=768&&i.a.createElement(i.a.Fragment,null,n===y.f.ROTATING_IMAGES_COMPONENT&&r===y.a.FEATURE_ICON&&c&&Array.isArray(c)&&(null===c||void 0===c?void 0:c.length)>0&&i.a.createElement(K,{aplus:!1,loop:!0,uid:l,banners:c,count:null===c||void 0===c?void 0:c.length,width:k,scrollAnimation:V,modalOpenFlag:C}),n===y.f.CROMA_PRODUCT_COLUMN_COMPONENT&&r===y.a.BANNER&&i.a.createElement(i.a.Fragment,null,d===y.b.STACK&&i.a.createElement(z,{width:k,subTitle:m&&m,showSubTitle:h&&h,uid:l,title:Y&&Y,showTitle:J&&J,recName:p,numOfColumn:null===q||void 0===q?void 0:q.slice(1),name:"".concat(l).concat(t),data:e,items:c,deviceType:a,titleColor:e.titleColorForDesktop,subTitleColor:e.subtitleColorForDesktop,centerGap:e.imageCenterGapForDesktop,titleAlignment:e.titleAlignmentForDesktop,subtitleAlignment:e.subtitleAlignmentForDesktop,cornerRadius:e.imageCornerRadiusForDesktop,topMargin:e.imageTopMarginForDesktop,bottomMargin:e.imagebottomMarginForDesktop,showBackGround:e.isBackgroundEnableForDesktop,backGroundImageData:e.backGroundMedia,linearGradientColor1:e.backgroundGradientColor1ForDesktop,linearGradientColor2:e.backgroundGradientColor2ForDesktop,backgroundColorSolid:e.backgroundColorForDesktop,gradientDirection:e.backgroundColorGradientTypeForDesktop,activateTimer:e.activateTimerForDesktop,textTimerOff:e.textFieldForContentWhenTimerGoesOffDesktop,textSaleStartEnd:e.textFieldForSaleStartOrEndTextDesktop,timerStart:o.serverDateTime,timerEnd:e.selectStartOrEndDateAndTimeDesktop,timerAlignment:e.alignmentForTimerDesktop,timercolor:e.colorOfTimerAndTextDesktop,topPadding:e.textFieldForDynamicTopPaddingForBackgroundImageForDesktop,headingName:p}),d===y.b.CAROUSEL&&c&&Array.isArray(c)&&c.length>0&&i.a.createElement(H,{width:k,subTitle:m&&m,showSubTitle:h&&h,title:Y&&Y,showTitle:J&&J,numOfColumn:null===q||void 0===q?void 0:q.slice(1),items:c,name:"".concat(l).concat(t),count:c.length,uid:l,data:e&&e,deviceType:a,lazyLoad:!0,titleColor:e.titleColorForDesktop,subTitleColor:e.subtitleColorForDesktop,centerGap:e.imageCenterGapForDesktop,titleAlignment:e.titleAlignmentForDesktop,subtitleAlignment:e.subtitleAlignmentForDesktop,cornerRadius:e.imageCornerRadiusForDesktop,topMargin:e.imageTopMarginForDesktop,bottomMargin:e.imagebottomMarginForDesktop,showBackGround:e.isBackgroundEnableForDesktop,backGroundImageData:e.backGroundMedia,linearGradientColor1:e.backgroundGradientColor1ForDesktop,linearGradientColor2:e.backgroundGradientColor2ForDesktop,backgroundColorSolid:e.backgroundColorForDesktop,gradientDirection:e.backgroundColorGradientTypeForDesktop,activateTimer:e.activateTimerForDesktop,textTimerOff:e.textFieldForContentWhenTimerGoesOffDesktop,textSaleStartEnd:e.textFieldForSaleStartOrEndTextDesktop,timerStart:o.serverDateTime,timerEnd:e.selectStartOrEndDateAndTimeDesktop,timerAlignment:e.alignmentForTimerDesktop,timercolor:e.colorOfTimerAndTextDesktop,topPadding:e.textFieldForDynamicTopPaddingForBackgroundImageForDesktop,enableAutoScroll:e.enableAutoScrollDesktop,autoScrollType:e.autoScrollDesktop,headingName:p})),n===y.f.CROMA_FEATURE_COLUMN_COMPONENT&&r===y.a.BANNER&&i.a.createElement(i.a.Fragment,null,d===y.b.STACK&&i.a.createElement(z,{width:k,subTitle:m&&m,showSubTitle:h&&h,uid:l,title:Y&&Y,showTitle:J&&J,recName:p,numOfColumn:null===q||void 0===q?void 0:q.slice(1),name:"".concat(l).concat(t),data:e,items:c,deviceType:a,titleColor:e.titleColorForDesktop,subTitleColor:e.subtitleColorForDesktop,centerGap:e.imageCenterGapForDesktop,titleAlignment:e.titleAlignmentForDesktop,subtitleAlignment:e.subtitleAlignmentForDesktop,cornerRadius:e.imageCornerRadiusForDesktop,topMargin:e.imageTopMarginForDesktop,bottomMargin:e.imagebottomMarginForDesktop,showBackGround:e.isBackgroundEnableForDesktop,backGroundImageData:e.backGroundMedia,linearGradientColor1:e.backgroundGradientColor1ForDesktop,linearGradientColor2:e.backgroundGradientColor2ForDesktop,backgroundColorSolid:e.backgroundColorForDesktop,gradientDirection:e.backgroundColorGradientTypeForDesktop,activateTimer:e.activateTimerForDesktop,textTimerOff:e.textFieldForContentWhenTimerGoesOffDesktop,textSaleStartEnd:e.textFieldForSaleStartOrEndTextDesktop,timerStart:o.serverDateTime,timerEnd:e.selectStartOrEndDateAndTimeDesktop,timerAlignment:e.alignmentForTimerDesktop,timercolor:e.colorOfTimerAndTextDesktop,topPadding:e.textFieldForDynamicTopPaddingForBackgroundImageForDesktop,contentBoxPlacement:e.contentBoxPlacementDesktop,horizontalAlignmentForContentSpace:e.horizontalAlignmentForContentSpaceDesktop,verticalAlignmentForContentSpace:e.verticalAlignmentForContentSpaceDesktop,headingName:p}),d===y.b.CAROUSEL&&c&&Array.isArray(c)&&c.length>0&&i.a.createElement(H,{width:k,subTitle:m&&m,showSubTitle:h&&h,title:Y&&Y,showTitle:J&&J,numOfColumn:null===q||void 0===q?void 0:q.slice(1),items:c,name:"".concat(l).concat(t),count:c.length,uid:l,data:e&&e,deviceType:a,lazyLoad:!0,titleColor:e.titleColorForDesktop,subTitleColor:e.subtitleColorForDesktop,centerGap:e.imageCenterGapForDesktop,titleAlignment:e.titleAlignmentForDesktop,subtitleAlignment:e.subtitleAlignmentForDesktop,cornerRadius:e.imageCornerRadiusForDesktop,topMargin:e.imageTopMarginForDesktop,bottomMargin:e.imagebottomMarginForDesktop,showBackGround:e.isBackgroundEnableForDesktop,backGroundImageData:e.backGroundMedia,linearGradientColor1:e.backgroundGradientColor1ForDesktop,linearGradientColor2:e.backgroundGradientColor2ForDesktop,backgroundColorSolid:e.backgroundColorForDesktop,gradientDirection:e.backgroundColorGradientTypeForDesktop,activateTimer:e.activateTimerForDesktop,textTimerOff:e.textFieldForContentWhenTimerGoesOffDesktop,textSaleStartEnd:e.textFieldForSaleStartOrEndTextDesktop,timerStart:o.serverDateTime,timerEnd:e.selectStartOrEndDateAndTimeDesktop,timerAlignment:e.alignmentForTimerDesktop,timercolor:e.colorOfTimerAndTextDesktop,topPadding:e.textFieldForDynamicTopPaddingForBackgroundImageForDesktop,enableAutoScroll:e.enableAutoScrollDesktop,autoScrollType:e.autoScrollDesktop,contentBoxPlacement:e.contentBoxPlacementDesktop,horizontalAlignmentForContentSpace:e.horizontalAlignmentForContentSpaceDesktop,verticalAlignmentForContentSpace:e.verticalAlignmentForContentSpaceDesktop,headingName:p}))))})}return i.a.createElement("div",null)})(),i.a.createElement(v,{ref:M,varient:A,msg:E}))}return i.a.createElement("div",null)},J=e=>{let{homeReducer:t,LoginReducer:o}=e;const{homeData2:r,isFetching2:i,deviceType:a,carousalData:n,observerArray:l,modalOpenFlag:c}=t,{signInToken:d}=o;return{homeData:r,isFetching:i,deviceType:a,carousalData:n,signInToken:d,observerArray:l,modalOpenFlag:c}},V=e=>({fetchWishListData:()=>{e(Object(n.q)())},updateHomePageInView:()=>{e(Object(n.c)())},fetchListProduct:t=>{e(Object(n.e)(t))},fetchHomeData:()=>{e(Object(n.l)())},fetchAndInitializeObserverArray:()=>{e(Object(n.d)())},fetchPriceList:t=>{e(Object(n.h)(t))}});t.default=Object(a.b)(J,V)(Y)}}]);