import{ag as k,ah as S,ai as q,ar as y,at as D,C as T,d as _,B as j,aR as I,aS as P,L as u,aC as m,A as p,a as h}from"./main-7cd5216e.js";import{p as l,T as R,i as L}from"./array-cc2e2e42.js";import{a as f}from"./react-ef3399cd.js";import{P as A}from"./index-c91a5828.js";import{P as M}from"./index-988e82f7.js";import{d as O}from"./Add-756ea659.js";import{a as t,F as V,j as e}from"./createLucideIcon-5244bfd8.js";import{G as C}from"./Grid-9fa1086d.js";import{C as B}from"./CardHeader-92f6f4b2.js";import{C as E}from"./CardContent-3b845101.js";import{am as g}from"./formik.esm-48e41763.js";import"./chevron-left-7fef36cd.js";import"./Box-a7bad236.js";import"./freelancerSlice-d7c5526c.js";import"./axios-a900fd7e.js";import"./x-d8df971e.js";import"./AddTwoTone-52c70298.js";var c={},F=S;Object.defineProperty(c,"__esModule",{value:!0});var v=c.default=void 0,W=F(k()),$=q,z=(0,W.default)((0,$.jsx)("path",{d:"M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"}),"Person");v=c.default=z;const x=["username@gmail.com","user02@gmail.com"];function b(i){const{onClose:r,selectedValue:o,open:s}=i,d=()=>{r(o)},n=a=>{r(a)};return t(I,{onClose:d,open:s,children:[e(P,{children:"Set backup account"}),t(L,{sx:{pt:0},children:[x.map(a=>t(u,{button:!0,onClick:()=>n(a),children:[e(m,{children:e(p,{sx:{bgcolor:g[100],color:g[600]},children:e(v,{})})}),e(h,{primary:a})]},a)),t(u,{autoFocus:!0,button:!0,onClick:()=>n("addAccount"),children:[e(m,{children:e(p,{children:e(O,{})})}),e(h,{primary:"Add account"})]})]})]})}b.propTypes={onClose:l.func.isRequired,open:l.bool.isRequired,selectedValue:l.string.isRequired};function se(){const[i,r]=f.useState(!1),[o,s]=f.useState(x[1]);return t(V,{children:[e(y,{children:e("title",{children:"Modals - Components"})}),e(M,{children:e(A,{heading:"Modals",subHeading:"Dialogs inform users about a task and can contain critical information, require decisions, or involve multiple tasks.",docs:"https://material-ui.com/components/dialogs/"})}),e(D,{maxWidth:"lg",children:e(C,{container:!0,direction:"row",justifyContent:"center",alignItems:"stretch",spacing:3,children:e(C,{item:!0,xs:12,children:t(T,{children:[e(B,{title:"Basic Dialog"}),e(_,{}),t(E,{children:[t(R,{variant:"subtitle1",component:"div",children:["Selected: ",o]}),e("br",{}),e(j,{variant:"outlined",onClick:()=>{r(!0)},children:"Open simple dialog"}),e(b,{selectedValue:o,open:i,onClose:a=>{r(!1),s(a)}})]})]})})})})]})}export{se as default};