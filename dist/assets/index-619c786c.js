import{ar as c,at as h,C as b,d as f}from"./main-ee249c94.js";import{P as u}from"./index-9c1f2d64.js";import{P as x}from"./index-a5f63717.js";import{a as T}from"./react-ef3399cd.js";import{a as t,F as C,j as e}from"./createLucideIcon-5244bfd8.js";import{G as d}from"./Grid-9fa1086d.js";import{C as g}from"./CardHeader-92f6f4b2.js";import{C as y}from"./CardContent-3b845101.js";import{B as p}from"./Box-a7bad236.js";import{T as v,a as l}from"./Tabs-45f10467.js";import{T as w}from"./array-cc2e2e42.js";import"./chevron-left-7fef36cd.js";import"./formik.esm-48e41763.js";import"./freelancerSlice-d7c5526c.js";import"./axios-a900fd7e.js";import"./x-d8df971e.js";import"./AddTwoTone-52a8235c.js";import"./KeyboardArrowRight-188e7a04.js";function s(a){const{children:i,value:n,index:r,...o}=a;return e("div",{role:"tabpanel",hidden:n!==r,id:`simple-tabpanel-${r}`,"aria-labelledby":`simple-tab-${r}`,...o,children:n===r&&e(p,{sx:{p:3},children:e(w,{children:i})})})}function m(a){return{id:`simple-tab-${a}`,"aria-controls":`simple-tabpanel-${a}`}}function J(){const[a,i]=T.useState(0);return t(C,{children:[e(c,{children:e("title",{children:"Tabs - Components"})}),e(x,{children:e(u,{heading:"Tabs",subHeading:"Tabs make it easy to explore and switch between different views.",docs:"https://material-ui.com/components/tabs/"})}),e(h,{maxWidth:"lg",children:e(d,{container:!0,direction:"row",justifyContent:"center",alignItems:"stretch",spacing:3,children:e(d,{item:!0,xs:12,children:t(b,{children:[e(g,{title:"Basic Example"}),e(f,{}),e(y,{children:t(p,{sx:{width:"100%"},children:[t(v,{variant:"scrollable",scrollButtons:"auto",textColor:"primary",indicatorColor:"primary",value:a,onChange:(r,o)=>{i(o)},"aria-label":"basic tabs example",children:[e(l,{label:"Item One",...m(0)}),e(l,{label:"Item Two",...m(1)}),e(l,{label:"Item Three",...m(2)})]}),e(s,{value:a,index:0,children:"Item One"}),e(s,{value:a,index:1,children:"Item Two"}),e(s,{value:a,index:2,children:"Item Three"})]})})]})})})})]})}export{J as default};
