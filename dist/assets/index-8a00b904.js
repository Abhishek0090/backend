import{B as j,L as T,a as W,C as $,M as k,d as K,ac as Q,ar as X}from"./main-f01344a0.js";import{j as n,a as i,F as D}from"./createLucideIcon-5244bfd8.js";import{G as f}from"./Grid-9fa1086d.js";import{T as o,I as E,l as Z,i as p,S as w}from"./array-cc2e2e42.js";import{P as y}from"./index-332ee04c.js";import{a as m}from"./react-ef3399cd.js";import{d as O}from"./chevron-left-7fef36cd.js";import"./numeral-7212362b.js";import{h as ee}from"./moment-fbc5633a.js";import{L as ne}from"./index-b0eef479.js";import{d as ae}from"./RemoveRedEyeTwoTone-6aa053f0.js";import{d as te}from"./DeleteTwoTone-75297fae.js";import{d as le}from"./MoreVertTwoTone-da0f4c46.js";import{B as d}from"./Box-a7bad236.js";import{z as ie,J as se,a1 as I,a2 as L}from"./formik.esm-48e41763.js";import{C as oe}from"./CardHeader-92f6f4b2.js";import{a as ue,M as me,T as R,b as he}from"./TableRow-9c4668ca.js";import{T as ce}from"./TableHead-0e489a9c.js";import{a as s,T as ge}from"./TablePagination-1a60c708.js";import{a as de}from"./axios-a900fd7e.js";import"./freelancerSlice-d7c5526c.js";import"./x-d8df971e.js";import"./Toolbar-cff0d745.js";import"./KeyboardArrowRight-188e7a04.js";import"./LastPage-d124ce37.js";function ve(){return n(f,{container:!0,justifyContent:"space-between",alignItems:"center",children:i(f,{item:!0,children:[n(o,{variant:"h3",component:"h3",gutterBottom:!0,children:"All Assignments"}),i(o,{variant:"subtitle2",children:[{name:"Catherine Pike",avatar:"/static/images/avatars/1.jpg"}.name,", these are all available assignments."]})]})})}const fe=ie(j)(({theme:t})=>`
     background: ${t.colors.error.main};
     color: ${t.palette.error.contrastText};

     &:hover {
        background: ${t.colors.error.dark};
     }
    `);function re(){const[t,l]=m.useState(!1),a=m.useRef(null),h=()=>{l(!0)},v=()=>{l(!1)};return i(D,{children:[i(d,{display:"flex",alignItems:"center",justifyContent:"space-between",children:[i(d,{display:"flex",alignItems:"center",children:[n(o,{variant:"h5",color:"text.secondary",children:"Bulk actions:"}),n(fe,{sx:{ml:1},startIcon:n(te,{}),variant:"contained",children:"Delete"})]}),n(E,{color:"primary",onClick:h,ref:a,sx:{ml:2,p:1},children:n(le,{})})]}),n(Z,{keepMounted:!0,anchorEl:a.current,open:t,onClose:v,anchorOrigin:{vertical:"center",horizontal:"center"},transformOrigin:{vertical:"center",horizontal:"center"},children:i(p,{sx:{p:1},component:"nav",children:[n(T,{button:!0,children:n(W,{primary:"Bulk delete selected"})}),n(T,{button:!0,children:n(W,{primary:"Bulk edit selected"})})]})})]})}const be=t=>{const l={Posted:{text:"Posted",color:"success"},"Under Process":{text:"Under Process",color:"warning"},Lost:{text:"Lost",color:"error"},"Assigned to PM":{text:"Assigned to PM",color:"success"},"Assigned to Freelancer":{text:"Assigned to Freelancer",color:"success"},Completed:{text:"Completed",color:"success"},"Review Received":{text:"Review Received",color:"info"}},{text:a,color:h}=l[t];return n(ne,{color:h,children:a})},F=(t,l)=>t==null?void 0:t.filter(a=>{let h=!0;return l!=null&&l.status&&(a==null?void 0:a.status)!==(l==null?void 0:l.status)&&(h=!1),l!=null&&l.stream&&(a==null?void 0:a.stream)!==(l==null?void 0:l.stream)&&(h=!1),h}),xe=(t,l,a)=>(t==null?void 0:t.length)>0?t==null?void 0:t.slice(l*a,l*a+a):[];function Ce({cryptoOrders:t}){const l=O(),[a,h]=m.useState([]),v=a.length>0,[b,U]=m.useState(0),[x,z]=m.useState(50),[c,C]=m.useState({status:null}),[P,S]=m.useState({stream:null}),_=[{id:"all",name:"All"},{id:"Posted",name:"Posted"},{id:"Under Process",name:"Under Process"},{id:"Assigned to PM",name:"Assigned to PM"},{id:"Assigned to Freelancer",name:"Assigned to Freelancer"},{id:"Completed",name:"Completed"},{id:"Review Received",name:"Review Received"},{id:"Lost",name:"Lost"}],Y=[{id:"all",name:"All"},{id:"Engineering",name:"Engineering"},{id:"Arts",name:"Arts"},{id:"Medical",name:"Medical"},{id:"Commerce",name:"Commerce"}],H=e=>{let u=null;e.target.value!=="all"&&(u=e.target.value),e.target.value==="all"&&(u=null),C(g=>({...g,status:u}))},N=e=>{let u=null;e.target.value!=="all"&&(u=e.target.value),e.target.value==="all"&&(u=null),S(g=>({...g,stream:u}))},G=()=>{C({status:null}),S({stream:null})},J=(e,u)=>{U(u)},V=e=>{z(parseInt(e.target.value))},A=F(t,c),q=F(A,P),r=xe(q,b,x);(a==null?void 0:a.length)>0&&(a==null?void 0:a.length)<(t==null?void 0:t.length),a==null||a.length,t==null||t.length;const B=se();return console.log("data",t),i($,{children:[v&&n(d,{flex:1,p:2,children:n(re,{})}),!v&&n(oe,{action:i(d,{width:500,display:"flex",justifyContent:"space-between",alignItems:"center",children:[c.status!==null||c.stream!==null?n(j,{sx:{mr:4},color:"primary",variant:"contained",onClick:G,children:"Clear"}):null,i(I,{fullWidth:!0,variant:"outlined",sx:{mr:4},children:[n(L,{children:"Stream"}),n(w,{value:P.stream,onChange:N,label:"Stream",autoWidth:!0,children:Y.map(e=>n(k,{value:e==null?void 0:e.id,children:e==null?void 0:e.name},e==null?void 0:e.id))})]}),i(I,{fullWidth:!0,variant:"outlined",children:[n(L,{children:"Status"}),n(w,{value:c==null?void 0:c.status,onChange:H,label:"Status",autoWidth:!0,children:_.map(e=>n(k,{value:e==null?void 0:e.id,children:e==null?void 0:e.name},e==null?void 0:e.id))})]})]}),title:"All Assignments"}),n(K,{}),n(ue,{children:i(me,{children:[n(ce,{children:i(R,{children:[n(s,{children:"Assignment ID"}),n(s,{children:"User Name"}),n(s,{children:"Title"}),n(s,{align:"right",children:"Budget"}),n(s,{align:"right",children:"Status"}),n(s,{align:"right",children:"Actions"})]})}),n(he,{children:r==null?void 0:r.map(e=>{var g,M;const u=a==null?void 0:a.includes(e==null?void 0:e.id);return i(R,{hover:!0,selected:u,children:[i(s,{children:[n(o,{variant:"body1",fontWeight:"bold",gutterBottom:!0,noWrap:!0,onClick:()=>l(`/team/management/assignments/details/${e==null?void 0:e.id}`),color:"#3f51b5",children:e==null?void 0:e.id}),n(o,{variant:"body2",color:"text.secondary",noWrap:!0,children:ee(e==null?void 0:e.deadline).format("MMMM Do YYYY, h:mm:ss a")}),n(o,{variant:"body2",color:"text.secondary",noWrap:!0})]}),i(s,{children:[n(o,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:e==null?void 0:e.user_name}),i(o,{onClick:()=>l(`/team/management/assignments/details/${e==null?void 0:e.id}`),variant:"body2",color:"#3f51b5",noWrap:!0,children:["id : ",e==null?void 0:e.user_id]})]}),i(s,{children:[n(o,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:e==null?void 0:e.title}),i(o,{variant:"body2",color:"text.secondary",noWrap:!0,children:[(g=e==null?void 0:e.description)==null?void 0:g.slice(0,50),"..."]})]}),i(s,{align:"right",children:[i(o,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:["₹",(M=e==null?void 0:e.budget)==null?void 0:M.toLocaleString("en-US",{style:"currency",currency:"INR"})]}),n(o,{variant:"body2",color:"text.secondary",noWrap:!0})]}),n(s,{align:"right",children:(e==null?void 0:e.status)===""?null:be(e==null?void 0:e.status)}),n(s,{align:"right",children:n(Q,{title:"View Details",arrow:!0,children:n(E,{onClick:()=>{l(`/team/management/assignments/details/${e==null?void 0:e.id}`)},sx:{"&:hover":{background:B.colors.primary.lighter},color:B.palette.primary.main},color:"inherit",size:"small",children:n(ae,{fontSize:"small"})})})})]},e==null?void 0:e.id)})})]})}),n(d,{p:2,children:n(ge,{component:"div",count:A.length,onPageChange:J,onRowsPerPageChange:V,page:b,rowsPerPage:x,rowsPerPageOptions:[5,10,25,30,50,75,100,200]})})]})}function Pe(){const[t,l]=m.useState([]);return m.useEffect(()=>{de.get("http://test.bluepen.co.in/api/team/freelancingassignmenttable.php").then(a=>{l(a==null?void 0:a.data)}).catch(a=>{console.log(a)})},[]),n($,{children:(t==null?void 0:t.length)>0&&n(Ce,{cryptoOrders:t})})}function qe(){return i(D,{children:[n(X,{children:n("title",{children:"Deleted Copy Paste"})}),n(y,{children:n(ve,{})}),n(d,{fullwidth:"true",sx:{mx:2},children:n(f,{container:!0,direction:"row",justifyContent:"center",alignItems:"stretch",spacing:3,children:n(f,{item:!0,xs:12,children:n(Pe,{})})})})]})}export{qe as default};
