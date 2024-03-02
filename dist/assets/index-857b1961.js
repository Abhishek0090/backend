import{B,C as T,d as k,ac as C,ar as $,at as F}from"./main-f01344a0.js";import{j as n,a as h,F as I}from"./createLucideIcon-5244bfd8.js";import{G as u}from"./Grid-9fa1086d.js";import{T as o,I as S}from"./array-cc2e2e42.js";import{P as j}from"./index-332ee04c.js";import{a as m}from"./react-ef3399cd.js";import{d as A}from"./chevron-left-7fef36cd.js";import"./numeral-7212362b.js";import"./moment-fbc5633a.js";import"./index-b0eef479.js";import{d as R}from"./RemoveRedEyeTwoTone-6aa053f0.js";import{z,J as D}from"./formik.esm-48e41763.js";import{a as E,M as H,T as v,b as G}from"./TableRow-9c4668ca.js";import{T as L}from"./TableHead-0e489a9c.js";import{a as t,T as M}from"./TablePagination-1a60c708.js";import{B as N}from"./Box-a7bad236.js";import{a as _}from"./axios-a900fd7e.js";import"./freelancerSlice-d7c5526c.js";import"./x-d8df971e.js";import"./Toolbar-cff0d745.js";import"./KeyboardArrowRight-188e7a04.js";import"./LastPage-d124ce37.js";function J(){return n(u,{container:!0,justifyContent:"space-between",alignItems:"center",children:h(u,{item:!0,children:[n(o,{variant:"h3",component:"h3",gutterBottom:!0,children:"All Freelancers"}),h(o,{variant:"subtitle2",children:[{name:"Catherine Pike",avatar:"/static/images/avatars/1.jpg"}.name,", these are all the freelancers."]})]})})}z(B)(({theme:e})=>`
     background: ${e.colors.error.main};
     color: ${e.palette.error.contrastText};

     &:hover {
        background: ${e.colors.error.dark};
     }
    `);const V=(e,l,i)=>(e==null?void 0:e.length)>0?e==null?void 0:e.slice(l*i,l*i+i):[],q=({cryptoOrders:e})=>{const l=A(),[i,Q]=m.useState([]);i.length>0;const[f,x]=m.useState(0),[b,P]=m.useState(50),W=(a,g)=>{x(g)},w=a=>{P(parseInt(a.target.value))},s=V(e,f,b);(i==null?void 0:i.length)>0&&(i==null?void 0:i.length)<(e==null?void 0:e.length),i==null||i.length,e==null||e.length;const c=D();return h(T,{children:[n(k,{}),n(E,{children:h(H,{children:[n(L,{children:h(v,{children:[n(t,{children:"Freelancer ID"}),n(t,{children:"Freelancer Name"}),n(t,{children:"Phone"}),n(t,{children:"Whatsapp"}),n(t,{children:"Email"}),n(t,{children:"Actions"})]})}),n(G,{children:s==null?void 0:s.map(a=>{const g=i==null?void 0:i.includes(a==null?void 0:a.id);return h(v,{hover:!0,selected:g,children:[n(t,{children:n(o,{component:"a",variant:"body1",fontWeight:"bold",gutterBottom:!0,noWrap:!0,onClick:()=>l("/management/profile/details"),color:"#3f51b5",children:a==null?void 0:a.id})}),n(t,{children:n(o,{component:"a",variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:a==null?void 0:a.name})}),n(t,{children:n(o,{component:"a",variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,href:`tel: ${a==null?void 0:a.phone}`,children:a==null?void 0:a.phone})}),n(t,{children:n(o,{component:"a",variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,href:`https://wa.me/${a==null?void 0:a.country_code}${a==null?void 0:a.whatsapp}?text=Hi%20I%20am%20interested%20in%20your%20services%20and%20would%20like%20to%20know%20more%20about%20it.`,children:a==null?void 0:a.whatsapp})}),n(t,{children:n(o,{component:"a",variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,href:`mailto: ${a==null?void 0:a.email}`,children:a==null?void 0:a.email})}),n(t,{align:"right",children:n(C,{title:"View Details",arrow:!0,children:n(S,{onClick:()=>{l(`/management/profile/details/${a==null?void 0:a.id}`)},sx:{"&:hover":{background:c.colors.primary.lighter},color:c.palette.primary.main},color:"inherit",size:"small",children:n(R,{fontSize:"small"})})})})]},a==null?void 0:a.id)})})]})}),n(N,{p:2,children:n(M,{component:"div",count:e==null?void 0:e.length,onPageChange:W,onRowsPerPageChange:w,page:f,rowsPerPage:b,rowsPerPageOptions:[5,10,25,30,50,75,100,200]})})]})};function K(){const[e,l]=m.useState([]);return m.useEffect(()=>{_.get("http://test.bluepen.co.in/api/team/freelancertable.php").then(i=>{console.log(i==null?void 0:i.data),l(i==null?void 0:i.data)}).catch(i=>{console.log(i)})},[]),n(T,{children:(e==null?void 0:e.length)>0&&n(q,{cryptoOrders:e})})}function ba(){return h(I,{children:[n($,{children:n("title",{children:"All Freelancers"})}),n(j,{children:n(J,{})}),n(F,{maxWidth:"xl",children:n(u,{container:!0,direction:"row",justifyContent:"center",alignItems:"stretch",spacing:3,children:n(u,{item:!0,xs:12,children:n(K,{})})})})]})}export{ba as default};
