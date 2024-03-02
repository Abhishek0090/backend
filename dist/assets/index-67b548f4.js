import{B as O,L as v,a as T,C as x,M as _,d as H,K as M,aD as G,ac as q,al as c,ar as K,at as N}from"./main-f01344a0.js";import{j as e,a as r,F as B}from"./createLucideIcon-5244bfd8.js";import{G as y}from"./Grid-9fa1086d.js";import{T as l,I as P,l as V,i as Q,p as U,S as X}from"./array-cc2e2e42.js";import{P as Y}from"./index-332ee04c.js";import{a as u}from"./react-ef3399cd.js";import{d as Z}from"./RemoveRedEyeTwoTone-6aa053f0.js";import{d as ee}from"./DeleteTwoTone-75297fae.js";import{d as te}from"./MoreVertTwoTone-da0f4c46.js";import{B as h}from"./Box-a7bad236.js";import{z as re,J as ae,a1 as ne,a2 as oe}from"./formik.esm-48e41763.js";import{d as ie}from"./WhatsApp-f0c36484.js";import{d as se}from"./LocalPhoneTwoTone-9a1da311.js";import{C as le}from"./CardHeader-92f6f4b2.js";import{a as ce,M as de,T as w,b as me}from"./TableRow-9c4668ca.js";import{T as ue}from"./TableHead-0e489a9c.js";import{a as s,T as he}from"./TablePagination-1a60c708.js";import"./chevron-left-7fef36cd.js";import"./freelancerSlice-d7c5526c.js";import"./axios-a900fd7e.js";import"./x-d8df971e.js";import"./Toolbar-cff0d745.js";import"./KeyboardArrowRight-188e7a04.js";import"./LastPage-d124ce37.js";function pe(){return e(y,{container:!0,justifyContent:"space-between",alignItems:"center",children:r(y,{item:!0,children:[e(l,{variant:"h3",component:"h3",gutterBottom:!0,children:"Approved Freelancers"}),r(l,{variant:"subtitle2",children:[{name:"Catherine Pike",avatar:"/static/images/avatars/1.jpg"}.name,", these are the approved freelancers."]})]})})}const ye=re(O)(({theme:a})=>`
     background: ${a.colors.error.main};
     color: ${a.palette.error.contrastText};

     &:hover {
        background: ${a.colors.error.dark};
     }
    `);function ge(){const[a,n]=u.useState(!1),i=u.useRef(null),d=()=>{n(!0)},p=()=>{n(!1)};return r(B,{children:[r(h,{display:"flex",alignItems:"center",justifyContent:"space-between",children:[r(h,{display:"flex",alignItems:"center",children:[e(l,{variant:"h5",color:"text.secondary",children:"Bulk actions:"}),e(ye,{sx:{ml:1},startIcon:e(ee,{}),variant:"contained",children:"Delete"})]}),e(P,{color:"primary",onClick:d,ref:i,sx:{ml:2,p:1},children:e(te,{})})]}),e(V,{keepMounted:!0,anchorEl:i.current,open:a,onClose:p,anchorOrigin:{vertical:"center",horizontal:"center"},transformOrigin:{vertical:"center",horizontal:"center"},children:r(Q,{sx:{p:1},component:"nav",children:[e(v,{button:!0,children:e(T,{primary:"Bulk delete selected"})}),e(v,{button:!0,children:e(T,{primary:"Bulk edit selected"})})]})})]})}const Ce=(a,n)=>a.filter(i=>{let d=!0;return n.status&&i.status!==n.status&&(d=!1),d}),De=(a,n,i)=>a.slice(n*i,n*i+i),g=({cryptoOrders:a})=>{const[n,i]=u.useState([]),d=n.length>0,[p,I]=u.useState(0),[C,A]=u.useState(10),[D,W]=u.useState({status:null}),k=[{id:"all",name:"All"},{id:"completed",name:"Completed"},{id:"pending",name:"Pending"},{id:"failed",name:"Failed"}],$=t=>{let o=null;t.target.value!=="all"&&(o=t.target.value),W(m=>({...m,status:o}))},S=t=>{i(t.target.checked?a.map(o=>o.id):[])},L=(t,o)=>{n.includes(o)?i(m=>m.filter(E=>E!==o)):i(m=>[...m,o])},J=(t,o)=>{I(o)},F=t=>{A(parseInt(t.target.value))},b=Ce(a,D),R=De(b,p,C),j=n.length>0&&n.length<a.length,z=n.length===a.length,f=ae();return r(x,{children:[d&&e(h,{flex:1,p:2,children:e(ge,{})}),!d&&e(le,{action:e(h,{width:250,children:r(ne,{fullWidth:!0,variant:"outlined",children:[e(oe,{children:"Status"}),e(X,{value:D.status||"all",onChange:$,label:"Status",autoWidth:!0,children:k.map(t=>e(_,{value:t.id,children:t.name},t.id))})]})}),title:"Recent Orders"}),e(H,{}),e(ce,{children:r(de,{children:[e(ue,{children:r(w,{children:[e(s,{padding:"checkbox",children:e(M,{color:"primary",checked:z,indeterminate:j,onChange:S})}),e(s,{children:"Freelancer ID"}),e(s,{children:"Name"}),e(s,{children:"Contact Details"}),e(s,{align:"right",children:"City"}),e(s,{align:"right",children:"Actions"})]})}),e(me,{children:R.map(t=>{const o=n.includes(t.id);return r(w,{hover:!0,selected:o,children:[e(s,{padding:"checkbox",children:e(M,{color:"primary",checked:o,onChange:m=>L(m,t.id),value:o})}),r(s,{children:[e(l,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:t.orderDetails}),e(l,{variant:"body2",color:"text.secondary",noWrap:!0,children:G(t.orderDate,"MMMM dd yyyy")})]}),r(s,{children:[e(l,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:t.orderID}),e(l,{variant:"body2",color:"text.secondary",noWrap:!0,children:t.email})]}),r(s,{children:[r(l,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:[e(ie,{})," ",t.whatsappnumber]}),r(l,{variant:"body2",color:"text.secondary",noWrap:!0,children:[e(se,{})," ",t.phonenumber]})]}),r(s,{align:"right",children:[e(l,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:t.city}),e(l,{variant:"body2",color:"text.secondary",noWrap:!0,children:t.state})]}),e(s,{align:"right",children:e(q,{title:"View Details",arrow:!0,children:e(P,{sx:{"&:hover":{background:f.colors.primary.lighter},color:f.palette.primary.main},color:"inherit",size:"small",children:e(Z,{fontSize:"small"})})})})]},t.id)})})]})}),e(h,{p:2,children:e(he,{component:"div",count:b.length,onPageChange:J,onRowsPerPageChange:F,page:p,rowsPerPage:C,rowsPerPageOptions:[5,10,25,30]})})]})};g.propTypes={cryptoOrders:U.array.isRequired};g.defaultProps={cryptoOrders:[]};function be(){const a=[{id:"1",orderDetails:"456",email:"email123@email.com",orderDate:new Date().getTime(),progress:"Assigned to PM",assinstatus:"Active",orderID:"Jhon Doe",whatsappnumber:"+1 123 456 7890",phonenumber:"+1 123 456 7890",amountCrypto:34.4565,amount:56787,cryptoCurrency:"ETH",currency:"$",city:"Mumbai",state:"Maharashtra"},{id:"2",orderDetails:"456",email:"email123@email.com",orderDate:c(new Date,1).getTime(),progress:"Assigned to PM",assinstatus:"Active",orderID:"Jhon Doe",whatsappnumber:"+1 123 456 7890",phonenumber:"+1 123 456 7890",amountCrypto:6.58454334,amount:8734587,cryptoCurrency:"BTC",currency:"$",city:"Mumbai",state:"Maharashtra"},{id:"3",orderDetails:"456",email:"email123@email.com",orderDate:c(new Date,5).getTime(),progress:"Lost",assinstatus:"Lost",orderID:"Jhon Doe",whatsappnumber:"+1 123 456 7890",phonenumber:"+1 123 456 7890",amountCrypto:6.58454334,amount:8734587,cryptoCurrency:"BTC",currency:"$",city:"Mumbai",state:"Maharashtra"},{id:"4",orderDetails:"456",email:"email123@email.com",orderDate:c(new Date,55).getTime(),progress:"Reviewed",assinstatus:"Active",orderID:"Jhon Doe",whatsappnumber:"+1 123 456 7890",phonenumber:"+1 123 456 7890",amountCrypto:6.58454334,amount:8734587,cryptoCurrency:"BTC",currency:"$",city:"Mumbai",state:"Maharashtra"},{id:"5",orderDetails:"456",email:"email123@email.com",orderDate:c(new Date,56).getTime(),progress:"Confirmed",assinstatus:"Lost",orderID:"Jhon Doe",whatsappnumber:"+1 123 456 7890",phonenumber:"+1 123 456 7890",amountCrypto:6.58454334,amount:8734587,cryptoCurrency:"BTC",currency:"$",city:"Mumbai",state:"Maharashtra"},{id:"6",orderDetails:"456",email:"email123@email.com",orderDate:c(new Date,33).getTime(),progress:"Assigned to PM",assinstatus:"Active",orderID:"Jhon Doe",whatsappnumber:"+1 123 456 7890",phonenumber:"+1 123 456 7890",amountCrypto:6.58454334,amount:8734587,cryptoCurrency:"BTC",currency:"$",city:"Mumbai",state:"Maharashtra"},{id:"7",orderDetails:"456",email:"email123@email.com",orderDate:new Date().getTime(),progress:"Confirmed",assinstatus:"Active",orderID:"Jhon Doe",amountCrypto:2.346546,amount:234234,cryptoCurrency:"BTC",currency:"$",city:"Mumbai",state:"Maharashtra"},{id:"8",orderDetails:"Paypal Withdraw",orderDate:c(new Date,22).getTime(),progress:"Assigned to PM",assinstatus:"Active",orderID:"Jhon Doe",whatsappnumber:"+1 123 456 7890",phonenumber:"+1 123 456 7890",amountCrypto:3.345456,amount:34544,cryptoCurrency:"BTC",currency:"$",city:"Mumbai",state:"Maharashtra"},{id:"9",orderDetails:"456",email:"email123@email.com",orderDate:c(new Date,11).getTime(),progress:"Assigned to PM",assinstatus:"Active",orderID:"Jhon Doe",amountCrypto:1.4389567945,amount:123843,cryptoCurrency:"BTC",currency:"$",city:"Mumbai",state:"Maharashtra"},{id:"10",orderDetails:"Wallet Transfer",orderDate:c(new Date,123).getTime(),progress:"Lost",assinstatus:"Lost",orderID:"Jhon Doe",amountCrypto:765.5695,amount:7567,cryptoCurrency:"ADA",currency:"$",city:"Mumbai",state:"Maharashtra"}];return e(x,{children:e(g,{cryptoOrders:a})})}function Ge(){return r(B,{children:[e(K,{children:e("title",{children:"Deleted Freelancers"})}),e(Y,{children:e(pe,{})}),e(N,{maxWidth:"xl",children:e(y,{container:!0,direction:"row",justifyContent:"center",alignItems:"stretch",spacing:3,children:e(y,{item:!0,xs:12,children:e(be,{})})})})]})}export{Ge as default};
