import{k as p,l as f,z as w,_ as e,A as F,h as x,F as G,K as d,i as C,j as y}from"./formik.esm-48e41763.js";import{a as h}from"./react-ef3399cd.js";import{j}from"./createLucideIcon-5244bfd8.js";function M(o){return p("MuiFormGroup",o)}f("MuiFormGroup",["root","row","error"]);const R=["className","row"],S=o=>{const{classes:r,row:t,error:s}=o;return y({root:["root",t&&"row",s&&"error"]},M,r)},U=w("div",{name:"MuiFormGroup",slot:"Root",overridesResolver:(o,r)=>{const{ownerState:t}=o;return[r.root,t.row&&r.row]}})(({ownerState:o})=>e({display:"flex",flexDirection:"column",flexWrap:"wrap"},o.row&&{flexDirection:"row"})),_=h.forwardRef(function(r,t){const s=F({props:r,name:"MuiFormGroup"}),{className:a,row:l=!1}=s,c=x(s,R),i=G(),m=d({props:s,muiFormControl:i,states:["error"]}),n=e({},s,{row:l,error:m.error}),u=S(n);return j(U,e({className:C(u.root,a),ownerState:n,ref:t},c))}),D=_;export{D as F};
