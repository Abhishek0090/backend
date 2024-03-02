import{B as z,L as b,a as T,C as B,M as H,d as U,K as x,aD as O,ac as _,al as d,ar as G,at as V}from"./main-7cd5216e.js";import{j as e,a as s,F as A}from"./createLucideIcon-5244bfd8.js";import{G as g}from"./Grid-9fa1086d.js";import{T as l,I as P,l as K,i as Q,p as X,S as Y}from"./array-cc2e2e42.js";import{P as Z}from"./index-988e82f7.js";import{a as m}from"./react-ef3399cd.js";import{n as ee}from"./numeral-7212362b.js";import{L as w}from"./index-b0eef479.js";import{d as re}from"./RemoveRedEyeTwoTone-24d4fd66.js";import{d as te}from"./DeleteTwoTone-01866bdc.js";import{d as oe}from"./MoreVertTwoTone-6ea74a78.js";import{B as p}from"./Box-a7bad236.js";import{z as ne,J as ae,a1 as se,a2 as ie}from"./formik.esm-48e41763.js";import{C as ce}from"./CardHeader-92f6f4b2.js";import{a as le,M as de,T as L,b as ue}from"./TableRow-9c4668ca.js";import{T as me}from"./TableHead-0e489a9c.js";import{a,T as pe}from"./TablePagination-7a90a268.js";import"./chevron-left-7fef36cd.js";import"./freelancerSlice-d7c5526c.js";import"./axios-a900fd7e.js";import"./x-d8df971e.js";import"./Toolbar-cff0d745.js";import"./KeyboardArrowRight-188e7a04.js";import"./LastPage-d124ce37.js";function he(){return e(g,{container:!0,justifyContent:"space-between",alignItems:"center",children:s(g,{item:!0,children:[e(l,{variant:"h3",component:"h3",gutterBottom:!0,children:"All Assignments"}),s(l,{variant:"subtitle2",children:[{name:"Catherine Pike",avatar:"/static/images/avatars/1.jpg"}.name,", these are all available assignments."]})]})})}const ge=ne(z)(({theme:t})=>`
     background: ${t.colors.error.main};
     color: ${t.palette.error.contrastText};

     &:hover {
        background: ${t.colors.error.dark};
     }
    `);function ye(){const[t,o]=m.useState(!1),n=m.useRef(null),c=()=>{o(!0)},h=()=>{o(!1)};return s(A,{children:[s(p,{display:"flex",alignItems:"center",justifyContent:"space-between",children:[s(p,{display:"flex",alignItems:"center",children:[e(l,{variant:"h5",color:"text.secondary",children:"Bulk actions:"}),e(ge,{sx:{ml:1},startIcon:e(te,{}),variant:"contained",children:"Delete"})]}),e(P,{color:"primary",onClick:c,ref:n,sx:{ml:2,p:1},children:e(oe,{})})]}),e(K,{keepMounted:!0,anchorEl:n.current,open:t,onClose:h,anchorOrigin:{vertical:"center",horizontal:"center"},transformOrigin:{vertical:"center",horizontal:"center"},children:s(Q,{sx:{p:1},component:"nav",children:[e(b,{button:!0,children:e(T,{primary:"Bulk delete selected"})}),e(b,{button:!0,children:e(T,{primary:"Bulk edit selected"})})]})})]})}const Ce=t=>{const o={Lost:{text:"Lost",color:"error"},Active:{text:"Active",color:"success"}},{text:n,color:c}=o[t];return e(w,{color:c,children:n})},De=t=>{const o={Lost:{text:"Lost",color:"error"},"Assigned to PM":{text:"Assigned to PM",color:"success"},Confirmed:{text:"Confirmed",color:"warning"},Reviewed:{text:"Reviewed",color:"info"}},{text:n,color:c}=o[t];return e(w,{color:c,children:n})},fe=(t,o)=>t.filter(n=>{let c=!0;return o.status&&n.status!==o.status&&(c=!1),c}),ve=(t,o,n)=>t.slice(o*n,o*n+n),y=({cryptoOrders:t})=>{const[o,n]=m.useState([]),c=o.length>0,[h,I]=m.useState(0),[C,W]=m.useState(10),[D,M]=m.useState({status:null}),k=[{id:"all",name:"All"},{id:"completed",name:"Completed"},{id:"pending",name:"Pending"},{id:"failed",name:"Failed"}],S=r=>{let i=null;r.target.value!=="all"&&(i=r.target.value),M(u=>({...u,status:i}))},q=r=>{n(r.target.checked?t.map(i=>i.id):[])},$=(r,i)=>{o.includes(i)?n(u=>u.filter(F=>F!==i)):n(u=>[...u,i])},J=(r,i)=>{I(i)},N=r=>{W(parseInt(r.target.value))},f=fe(t,D),R=ve(f,h,C),j=o.length>0&&o.length<t.length,E=o.length===t.length,v=ae();return s(B,{children:[c&&e(p,{flex:1,p:2,children:e(ye,{})}),!c&&e(ce,{action:e(p,{width:250,children:s(se,{fullWidth:!0,variant:"outlined",children:[e(ie,{children:"Status"}),e(Y,{value:D.status||"all",onChange:S,label:"Status",autoWidth:!0,children:k.map(r=>e(H,{value:r.id,children:r.name},r.id))})]})}),title:"Recent Orders"}),e(U,{}),e(le,{children:s(de,{children:[e(me,{children:s(L,{children:[e(a,{padding:"checkbox",children:e(x,{color:"primary",checked:E,indeterminate:j,onChange:q})}),e(a,{children:"Assignment ID"}),e(a,{children:"User sourceName"}),e(a,{children:"Title"}),e(a,{align:"right",children:"Budget"}),e(a,{align:"right",children:"Status"}),e(a,{align:"right",children:"Progress"}),e(a,{align:"right",children:"Actions"})]})}),e(ue,{children:R.map(r=>{const i=o.includes(r.id);return s(L,{hover:!0,selected:i,children:[e(a,{padding:"checkbox",children:e(x,{color:"primary",checked:i,onChange:u=>$(u,r.id),value:i})}),s(a,{children:[e(l,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:r.orderDetails}),e(l,{variant:"body2",color:"text.secondary",noWrap:!0,children:O(r.orderDate,"MMMM dd yyyy")})]}),e(a,{children:e(l,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:r.orderID})}),s(a,{children:[e(l,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:r.sourceName}),e(l,{variant:"body2",color:"text.secondary",noWrap:!0,children:r.sourceDesc})]}),s(a,{align:"right",children:[s(l,{variant:"body1",fontWeight:"bold",color:"text.primary",gutterBottom:!0,noWrap:!0,children:[r.amountCrypto,r.cryptoCurrency]}),e(l,{variant:"body2",color:"text.secondary",noWrap:!0,children:ee(r.amount).format(`${r.currency}0,0.00`)})]}),e(a,{align:"right",children:Ce(r.assinstatus)}),e(a,{align:"right",children:De(r.progress)}),e(a,{align:"right",children:e(_,{title:"View Details",arrow:!0,children:e(P,{sx:{"&:hover":{background:v.colors.primary.lighter},color:v.palette.primary.main},color:"inherit",size:"small",children:e(re,{fontSize:"small"})})})})]},r.id)})})]})}),e(p,{p:2,children:e(pe,{component:"div",count:f.length,onPageChange:J,onRowsPerPageChange:N,page:h,rowsPerPage:C,rowsPerPageOptions:[5,10,25,30]})})]})};y.propTypes={cryptoOrders:X.array.isRequired};y.defaultProps={cryptoOrders:[]};function be(){const t=[{id:"1",orderDetails:"1234",orderDate:new Date().getTime(),progress:"Assigned to PM",assinstatus:"Active",orderID:"Jhon Doe",sourceName:"Lorem Occaecat voluptate do laborum nulla eu deserunt id.",sourceDesc:"*** 1111",amountCrypto:34.4565,amount:56787,cryptoCurrency:"ETH",currency:"$"},{id:"2",orderDetails:"1234",orderDate:d(new Date,1).getTime(),progress:"Assigned to PM",assinstatus:"Active",orderID:"Jhon Doe",sourceName:"Lorem Duis dolor officia magna aliquip ex est deserunt voluptate amet et.",sourceDesc:"*** 1111",amountCrypto:6.58454334,amount:8734587,cryptoCurrency:"BTC",currency:"$"},{id:"3",orderDetails:"1234",orderDate:d(new Date,5).getTime(),progress:"Lost",assinstatus:"Lost",orderID:"Jhon Doe",sourceName:"Lorem Velit deserunt magna sint cupidatat anim est ipsum.",sourceDesc:"*** 1111",amountCrypto:6.58454334,amount:8734587,cryptoCurrency:"BTC",currency:"$"},{id:"4",orderDetails:"1234",orderDate:d(new Date,55).getTime(),progress:"Reviewed",assinstatus:"Active",orderID:"Jhon Doe",sourceName:"Lorem Ullamco nulla dolore nulla pariatur occaecat nostrud ea veniam irure eiusmod ad aliqua.",sourceDesc:"*** 1111",amountCrypto:6.58454334,amount:8734587,cryptoCurrency:"BTC",currency:"$"},{id:"5",orderDetails:"1234",orderDate:d(new Date,56).getTime(),progress:"Confirmed",assinstatus:"Lost",orderID:"Jhon Doe",sourceName:"Lorem Laboris amet eiusmod in laboris in excepteur adipisicing dolor Lorem id velit.",sourceDesc:"*** 1111",amountCrypto:6.58454334,amount:8734587,cryptoCurrency:"BTC",currency:"$"},{id:"6",orderDetails:"1234",orderDate:d(new Date,33).getTime(),progress:"Assigned to PM",assinstatus:"Active",orderID:"Jhon Doe",sourceName:"Lorem Ex eu in enim anim.",sourceDesc:"*** 1111",amountCrypto:6.58454334,amount:8734587,cryptoCurrency:"BTC",currency:"$"},{id:"7",orderDetails:"1234",orderDate:new Date().getTime(),progress:"Confirmed",assinstatus:"Active",orderID:"Jhon Doe",sourceName:"Lorem Culpa velit elit consectetur veniam qui laborum cupidatat duis dolor veniam.",sourceDesc:"*** 1212",amountCrypto:2.346546,amount:234234,cryptoCurrency:"BTC",currency:"$"},{id:"8",orderDetails:"Paypal Withdraw",orderDate:d(new Date,22).getTime(),progress:"Assigned to PM",assinstatus:"Active",orderID:"Jhon Doe",sourceName:"Lorem Consequat tempor magna labore nostrud reprehenderit aliqua incididunt et aliquip ad reprehenderit consequat sint.",sourceDesc:"*** 1111",amountCrypto:3.345456,amount:34544,cryptoCurrency:"BTC",currency:"$"},{id:"9",orderDetails:"1234",orderDate:d(new Date,11).getTime(),progress:"Assigned to PM",assinstatus:"Active",orderID:"Jhon Doe",sourceName:"Lorem Consequat tempor magna labore nostrud reprehenderit aliqua incididunt et aliquip ad reprehenderit consequat sint.",sourceDesc:"*** 2222",amountCrypto:1.4389567945,amount:123843,cryptoCurrency:"BTC",currency:"$"},{id:"10",orderDetails:"Wallet Transfer",orderDate:d(new Date,123).getTime(),progress:"Lost",assinstatus:"Lost",orderID:"Jhon Doe",sourceName:"Lorem Consequat tempor magna labore nostrud reprehenderit aliqua incididunt et aliquip ad reprehenderit consequat sint.",sourceDesc:"John's Cardano Wallet",amountCrypto:765.5695,amount:7567,cryptoCurrency:"ADA",currency:"$"}];return e(B,{children:e(y,{cryptoOrders:t})})}function _e(){return s(A,{children:[e(G,{children:e("title",{children:"Writer Buy User"})}),e(Z,{children:e(he,{})}),e(V,{maxWidth:"xl",children:e(g,{container:!0,direction:"row",justifyContent:"center",alignItems:"stretch",spacing:3,children:e(g,{item:!0,xs:12,children:e(be,{})})})})]})}export{_e as default};
