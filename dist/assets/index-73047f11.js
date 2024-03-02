import{B as j,L as B,a as M,C as $,M as k,d as K,ac as Q,ar as X,at as Z}from"./main-ee249c94.js";import{j as n,a as i,F as E}from"./createLucideIcon-5244bfd8.js";import{G as f}from"./Grid-9fa1086d.js";import{T as o,I as U,l as p,i as y,S as w}from"./array-cc2e2e42.js";import{P as O}from"./index-a5f63717.js";import{a as u}from"./react-ef3399cd.js";import{d as ee}from"./chevron-left-7fef36cd.js";import"./numeral-7212362b.js";import{h as ne}from"./moment-fbc5633a.js";import{L as ae}from"./index-b0eef479.js";import{d as te}from"./RemoveRedEyeTwoTone-fe53fd1e.js";import{d as le}from"./DeleteTwoTone-a33086f4.js";import{d as ie}from"./MoreVertTwoTone-8adfaea8.js";import{B as d}from"./Box-a7bad236.js";import{z as se,J as oe,a1 as I,a2 as L}from"./formik.esm-48e41763.js";import{C as me}from"./CardHeader-92f6f4b2.js";import{a as ue,M as he,T as R,b as ce}from"./TableRow-9c4668ca.js";import{T as ge}from"./TableHead-0e489a9c.js";import{a as s,T as de}from"./TablePagination-ba9dffd6.js";import{a as ve}from"./axios-a900fd7e.js";import"./freelancerSlice-d7c5526c.js";import"./x-d8df971e.js";import"./Toolbar-cff0d745.js";import"./KeyboardArrowRight-188e7a04.js";import"./LastPage-d124ce37.js";function fe(){return n(f,{container:!0,justifyContent:"space-between",alignItems:"center",children:i(f,{item:!0,children:[n(o,{variant:"h3",component:"h3",gutterBottom:!0,children:"All Assignments"}),i(o,{variant:"subtitle2",children:[{name:"Catherine Pike",avatar:"/static/images/avatars/1.jpg"}.name,", these are all available assignments."]})]})})}const re=se(j)(({theme:t})=>`
     background: ${t.colors.error.main};
     color: ${t.palette.error.contrastText};

     &:hover {
        background: ${t.colors.error.dark};
     }
    `);function be(){const[t,l]=u.useState(!1),a=u.useRef(null),h=()=>{l(!0)},v=()=>{l(!1)};return i(E,{children:[i(d,{display:"flex",alignItems:"center",justifyContent:"space-between",children:[i(d,{display:"flex",alignItems:"center",children:[n(o,{variant:"h5",color:"text.secondary",children:"Bulk actions:"}),n(re,{sx:{ml:1},startIcon:n(le,{}),variant:"contained",children:"Delete"})]}),n(U,{color:"primary",onClick:h,ref:a,sx:{ml:2,p:1},children:n(ie,{})})]}),n(p,{keepMounted:!0,anchorEl:a.current,open:t,onClose:v,anchorOrigin:{vertical:"center",horizontal:"center"},transformOrigin:{vertical:"center",horizontal:"center"},children:i(y,{sx:{p:1},component:"nav",children:[n(B,{button:!0,children:n(M,{primary:"Bulk delete selected"})}),n(B,{button:!0,children:n(M,{primary:"Bulk edit selected"})})]})})]})}const xe=t=>{const l={Posted:{text:"Posted",color:"success"},"Under Process":{text:"Under Process",color:"warning"},Lost:{text:"Lost",color:"error"},"Assigned to PM":{text:"Assigned to PM",color:"success"},"Assigned to Freelancer":{text:"Assigned to Freelancer",color:"success"},Completed:{text:"Completed",color:"success"},"Review Received":{text:"Review Received",color:"info"}},{text:a,color:h}=l[t];return n(ae,{color:h,children:a})},F=(t,l)=>t==null?void 0:t.filter(a=>{let h=!0;return l!=null&&l.status&&(a==null?void 0:a.status)!==(l==null?void 0:l.status)&&(h=!1),l!=null&&l.stream&&(a==null?void 0:a.stream)!==(l==null?void 0:l.stream)&&(h=!1),h}),Ce=(t,l,a)=>(t==null?void 0:t.length)>0?t==null?void 0:t.slice(l*a,l*a+a):[];function Pe({cryptoOrders:t}){const l=ee(),[a,h]=u.useState([]),v=a.length>0,[b,z]=u.useState(0),[x,D]=u.useState(50),[c,C]=u.useState({status:null}),[P,S]=u.useState({stream:null}),_=[{id:"all",name:"All"},{id:"Posted",name:"Posted"},{id:"Under Process",name:"Under Process"},{id:"Assigned to PM",name:"Assigned to PM"},{id:"Assigned to Freelancer",name:"Assigned to Freelancer"},{id:"Completed",name:"Completed"},{id:"Review Received",name:"Review Received"},{id:"Lost",name:"Lost"}],Y=[{id:"all",name:"All"},{id:"Engineering",name:"Engineering"},{id:"Arts",name:"Arts"},{id:"Medical",name:"Medical"},{id:"Commerce",name:"Commerce"}],H=e=>{let m=null;e.target.value!=="all"&&(m=e.target.value),e.target.value==="all"&&(m=null),C(g=>({...g,status:m}))},N=e=>{let m=null;e.target.value!=="all"&&(m=e.target.value),e.target.value==="all"&&(m=null),S(g=>({...g,stream:m}))},G=()=>{C({status:null}),S({stream:null})},J=(e,m)=>{z(m)},V=e=>{D(parseInt(e.target.value))},A=F(t,c),q=F(A,P),r=Ce(q,b,x);(a==null?void 0:a.length)>0&&(a==null?void 0:a.length)<(t==null?void 0:t.length),a==null||a.length,t==null||t.length;const T=oe();return console.log("data",t),i($,{children:[v&&n(d,{flex:1,p:2,children:n(be,{})}),!v&&n(me,{action:i(d,{width:500,display:"flex",justifyContent:"space-between",alignItems:"center",children:[c.status!==null||c.stream!==null?n(j,{sx:{mr:4},color:"primary",variant:"contained",onClick:G,children:"Clear"}):null,i(I,{fullWidth:!0,variant:"outlined",sx:{mr:4},children:[n(L,{children:"Stream"}),n(w,{value:P.stream,onChange:N,label:"Stream",autoWidth:!0,children:Y.map(e=>n(k,{value:e==null?void 0:e.id,children:e==null?void 0:e.name},e==null?void 0:e.id))})]}),i(I,{fullWidth:!0,variant:"outlined",children:[n(L,{children:"Status"}),n(w,{value:c==null?void 0:c.status,onChange:H,label:"Status",autoWidth:!0,children:_.map(e=>n(k,{value:e==null?void 0:e.id,children:e==null?void 0:e.name},e==null?void 0:e.id))})]})]}),title:"All Assignments"}),n(K,{}),n(ue,{children:i(he,{children:[n(ge,{children:i(R,{children:[n(s,{children:"Assignment ID"}),n(s,{children:"User Name"}),n(s,{children:"Title"}),n(s,{align:"right",children:"Budget"}),n(s,{align:"right",children:"Status"}),n(s,{align:"right",children:"Actions"})]})}),n(ce,{children:r==null?void 0:r.map(e=>{var g,W;const m=a==null?void 0:a.includes(e==null?void 0:e.id);return i(R,{hover:!0,selected:m,children:[i(s,{children:[n(o,{variant:"body1",fontWeight:"bold",gutterBottom:!0,noWrap:!0,onClick:()=>l(`/team/management/assignments/details/${e==null?void 0:e.id}`),color:"#3f51b5",children:e==null?void 0:e.id}),n(o,{variant:"body2",color:"text.secondary",noWrap:!0,children:ne(e==null?void 0:e.deadline).format("MMMM Do YYYY, h:mm:ss a")}),n(o,{variant:"body2",color:"text.secondary",noWrap:!0})]}),i(s,{children:[n(o,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:e==null?void 0:e.user_name}),i(o,{onClick:()=>l(`/team/management/assignments/details/${e==null?void 0:e.id}`),variant:"body2",color:"#3f51b5",noWrap:!0,children:["id : ",e==null?void 0:e.user_id]})]}),i(s,{children:[n(o,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:e==null?void 0:e.title}),i(o,{variant:"body2",color:"text.secondary",noWrap:!0,children:[(g=e==null?void 0:e.description)==null?void 0:g.slice(0,50),"..."]})]}),i(s,{align:"right",children:[i(o,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:["₹",(W=e==null?void 0:e.budget)==null?void 0:W.toLocaleString("en-US",{style:"currency",currency:"INR"})]}),n(o,{variant:"body2",color:"text.secondary",noWrap:!0})]}),n(s,{align:"right",children:(e==null?void 0:e.status)===""?null:xe(e==null?void 0:e.status)}),n(s,{align:"right",children:n(Q,{title:"View Details",arrow:!0,children:n(U,{onClick:()=>{l(`/team/management/assignments/details/${e==null?void 0:e.id}`)},sx:{"&:hover":{background:T.colors.primary.lighter},color:T.palette.primary.main},color:"inherit",size:"small",children:n(te,{fontSize:"small"})})})})]},e==null?void 0:e.id)})})]})}),n(d,{p:2,children:n(de,{component:"div",count:A.length,onPageChange:J,onRowsPerPageChange:V,page:b,rowsPerPage:x,rowsPerPageOptions:[5,10,25,30,50,75,100,200]})})]})}function Se(){const[t,l]=u.useState([]);return u.useEffect(()=>{ve.get("https://test.bluepen.co.in/api/team/freelancingassignmenttable.php").then(a=>{l(a==null?void 0:a.data)}).catch(a=>{console.log(a)})},[]),n($,{children:(t==null?void 0:t.length)>0&&n(Pe,{cryptoOrders:t})})}function Ke(){return i(E,{children:[n(X,{children:n("title",{children:"Technical Assignments"})}),n(O,{children:n(fe,{})}),n(Z,{maxWidth:"xl",children:n(f,{container:!0,direction:"row",justifyContent:"center",alignItems:"stretch",spacing:3,children:n(f,{item:!0,xs:12,children:n(Se,{})})})})]})}export{Ke as default};
