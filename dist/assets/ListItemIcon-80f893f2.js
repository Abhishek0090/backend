import{z as I,_ as a,A as p,h as x,i as f,j as u}from"./formik.esm-48e41763.js";import{a as r}from"./react-ef3399cd.js";import{p as L}from"./main-7cd5216e.js";import{L as d}from"./array-cc2e2e42.js";import{j as g}from"./createLucideIcon-5244bfd8.js";const S=["className"],h=s=>{const{alignItems:t,classes:o}=s;return u({root:["root",t==="flex-start"&&"alignItemsFlexStart"]},L,o)},v=I("div",{name:"MuiListItemIcon",slot:"Root",overridesResolver:(s,t)=>{const{ownerState:o}=s;return[t.root,o.alignItems==="flex-start"&&t.alignItemsFlexStart]}})(({theme:s,ownerState:t})=>a({minWidth:56,color:(s.vars||s).palette.action.active,flexShrink:0,display:"inline-flex"},t.alignItems==="flex-start"&&{marginTop:8})),C=r.forwardRef(function(t,o){const e=p({props:t,name:"MuiListItemIcon"}),{className:i}=e,c=x(e,S),l=r.useContext(d),n=a({},e,{alignItems:l.alignItems}),m=h(n);return g(v,a({className:f(m.root,i),ownerState:n,ref:o},c))}),N=C;export{N as L};
