import{a as l}from"./react-ef3399cd.js";var i={},d={get exports(){return i},set exports(e){i=e}},u={};/**
 * @license React
 * react-jsx-runtime.production.min.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */var x=l,y=Symbol.for("react.element"),j=Symbol.for("react.fragment"),v=Object.prototype.hasOwnProperty,w=x.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,g={key:!0,ref:!0,__self:!0,__source:!0};function c(e,r,n){var t,o={},a=null,s=null;n!==void 0&&(a=""+n),r.key!==void 0&&(a=""+r.key),r.ref!==void 0&&(s=r.ref);for(t in r)v.call(r,t)&&!g.hasOwnProperty(t)&&(o[t]=r[t]);if(e&&e.defaultProps)for(t in r=e.defaultProps,r)o[t]===void 0&&(o[t]=r[t]);return{$$typeof:y,type:e,key:a,ref:s,props:o,_owner:w.current}}u.Fragment=j;u.jsx=c;u.jsxs=c;(function(e){e.exports=u})(d);const b=i.Fragment,k=i.jsx,E=i.jsxs,C=Object.freeze(Object.defineProperty({__proto__:null,Fragment:b,jsx:k,jsxs:E},Symbol.toStringTag,{value:"Module"}));var O={xmlns:"http://www.w3.org/2000/svg",width:24,height:24,viewBox:"0 0 24 24",fill:"none",stroke:"currentColor",strokeWidth:2,strokeLinecap:"round",strokeLinejoin:"round"};const R=e=>e.replace(/([a-z0-9])([A-Z])/g,"$1-$2").toLowerCase(),L=(e,r)=>{const n=l.forwardRef(({color:t="currentColor",size:o=24,strokeWidth:a=2,children:s,...p},f)=>l.createElement("svg",{ref:f,...O,width:o,height:o,stroke:t,strokeWidth:a,className:`lucide lucide-${R(e)}`,...p},[...r.map(([m,_])=>l.createElement(m,_)),...(Array.isArray(s)?s:[s])||[]]));return n.displayName=`${e}`,n};export{b as F,E as a,C as b,L as c,k as j};
