import{a as k}from"./axios-a900fd7e.js";import{v as ge}from"./freelancerSlice-d7c5526c.js";import{r as be,o as ye,_ as o}from"./main-f01344a0.js";import{a as c}from"./react-ef3399cd.js";import{c as _,a as t,F as d,j as e}from"./createLucideIcon-5244bfd8.js";import{d as Ne,j as we}from"./chevron-left-7fef36cd.js";import{M as ee,F as le}from"./array-cc2e2e42.js";import{B as te}from"./Box-a7bad236.js";import{L as _e}from"./list-checks-940295ff.js";import{C as Ce}from"./check-circle-537067c2.js";import{A as Se}from"./arrow-right-ca2ce5d0.js";import"./formik.esm-48e41763.js";import"./x-d8df971e.js";const je=_("AlertCircle",[["circle",{cx:"12",cy:"12",r:"10",key:"1mglay"}],["line",{x1:"12",y1:"8",x2:"12",y2:"12",key:"1grbh0"}],["line",{x1:"12",y1:"16",x2:"12.01",y2:"16",key:"1w440g"}]]),ke=_("CreditCard",[["rect",{x:"2",y:"5",width:"20",height:"14",rx:"2",key:"qneu4z"}],["line",{x1:"2",y1:"10",x2:"22",y2:"10",key:"1ytoly"}]]),ve=_("DownloadCloud",[["path",{d:"M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242",key:"1pljnt"}],["path",{d:"M12 12v9",key:"192myk"}],["path",{d:"m8 17 4 4 4-4",key:"1ul180"}]]),De=_("Folders",[["path",{d:"M8 17h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3.93a2 2 0 0 1-1.66-.9l-.82-1.2a2 2 0 0 0-1.66-.9H8a2 2 0 0 0-2 2v9c0 1.1.9 2 2 2Z",key:"1aska4"}],["path",{d:"M2 8v11c0 1.1.9 2 2 2h14",key:"n13cji"}]]),ae={position:"absolute",top:"50%",left:"50%",transform:"translate(-50%, -50%)",width:600,bgcolor:"background.paper",border:"2px solid #918EF4",boxShadow:24,p:4,borderRadius:"1rem",argin:"10px 100px",height:"auto"};function Be(){var L,W,R,T,P,$,z,M,U,B,O,V,H,q,G,Z,J,K,Q,X,Y;const v=Ne(),{id:g}=we(),n=ge(be),[l,se]=c.useState({}),[i,ne]=c.useState({}),[C,ie]=c.useState({}),[S,ce]=c.useState({}),[m,re]=c.useState({}),[f,oe]=c.useState({}),[b,D]=c.useState("Get Contact"),[j,de]=c.useState("writing"),[me,y]=c.useState(!1),[F,A]=c.useState(!1),[E,I]=c.useState(!1),fe=()=>A(!0),N=()=>A(!1),w=a=>{if((n==null?void 0:n.id)===null){o.error("Please login first");return}de(a),I(!0)},ue=()=>I(!1);c.useEffect(()=>{k.get(`http://test.bluepen.co.in/api/student/getwriter.php?writer_id=${g}&user_id=${n==null?void 0:n.id}`).then(a=>{var s,u,h,p,x,r;console.log(a.data),se(a==null?void 0:a.data),ne((s=a==null?void 0:a.data)==null?void 0:s.writing),ie((u=a==null?void 0:a.data)==null?void 0:u.diagram),ce((h=a==null?void 0:a.data)==null?void 0:h.ed),re((p=a==null?void 0:a.data)==null?void 0:p.typing),oe((x=a==null?void 0:a.data)==null?void 0:x.art),D((r=a==null?void 0:a.data)==null?void 0:r.contact_status)}).catch(a=>{console.log(a)})},[]);const he=()=>{b==="View Contact"?v("/client/phonebook"):b==="Get Contact"&&(n==null?void 0:n.id)!==null&&fe()},pe=()=>{if(y(!0),(n==null?void 0:n.id)===null){o.error("Please login first"),y(!1),N();return}if((l==null?void 0:l.user_wallet)<(l==null?void 0:l.cost)){o.error("Insufficient funds"),y(!1),N(),setTimeout(()=>{v("/client/wallet")},2e3);return}k.get(`http://test.bluepen.co.in/api/student/buywritercontact.php?writer_id=${g}&user_id=${n==null?void 0:n.id}`).then(a=>{console.log(a.data),o.success("Contact bought successfully"),y(!1),N(),D("View Contact")}).catch(a=>{console.log(a)})},xe=a=>{if(a===""){o.error("File not available");return}k.get(`http://test.bluepen.co.in/api/student/downloadwritersamples.php?writer_id=${g}&section=${j}&file_name=${a}`).then(s=>{var u,h,p;if(console.log(s.data),((u=s==null?void 0:s.data)==null?void 0:u.status)==="success"){o.success("File downloaded successfully");let x=(h=s==null?void 0:s.data)==null?void 0:h.file_url;console.log("url",x);let r=document.createElement("a");r.href=x,r.setAttribute("download",(p=s==null?void 0:s.data)==null?void 0:p.file_name),document.body.appendChild(r),r.click(),r.parentNode.removeChild(r)}else o.error("Error downloading file")}).catch(s=>{console.log(s),o.error("Something went wrong")})};return t(d,{children:[e("section",{className:"text-gray-600 bg-white bg-opacity-20 backdrop-blur-lg  drop-shadow-lg max-w-screen-xl mx-auto rounded-xl py-2 my-2 body-font",children:e("div",{className:"container px-6 py-8 mx-auto flex flex-col",children:e("div",{className:"lg:w-full mx-auto",children:t("div",{className:"flex flex-col sm:flex-row ",children:[t("div",{className:" sm:w-1/3 text-center  sm:pr-10 sm:pl-20 sm:py-8",children:[e("div",{className:"w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400",children:e("img",{src:"https://cdn-icons-png.flaticon.com/512/3135/3135715.png",alt:"writer",className:"w-20 h-20 rounded-full"})}),t("div",{className:"flex flex-col items-center text-center justify-center",children:[e("h2",{className:"font-medium title-font mt-4 text-gray-900 text-lg",children:l==null?void 0:l.writer_firstname}),e("div",{className:"w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"}),t("p",{className:"text-base flex items-center gap-2",children:[e(ke,{}),"Writer:",t("span",{className:"text-indigo-500 px-1",children:["#",l==null?void 0:l.writer_id," "]})]}),((L=l==null?void 0:l.writer_domains)==null?void 0:L.writing)===1&&e("p",{className:"text-base font-bold",children:"Copy-Paste writing cost per side as per deadline:"})]}),((W=l==null?void 0:l.writer_domains)==null?void 0:W.writing)===1&&t(d,{children:[t("ul",{className:"mt-4 flex flex-col gap-5",children:[t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center    rounded-full bg-green-100 text-green-500  px-2",children:"3+ Days:"}),t("span",{className:"ml-3 text-base font-bold",children:[" ","₹",(i==null?void 0:i.writing_3day_cost).toLocaleString("en-US",{style:"currency",currency:"INR"})]})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center    rounded-full bg-green-100 text-green-500  px-2",children:"2 Days:"}),t("span",{className:"ml-3 text-base font-bold",children:["₹",(i==null?void 0:i.writing_2day_cost).toLocaleString("en-US",{style:"currency",currency:"INR"})]})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center    rounded-full bg-green-100 text-green-500  px-2",children:"1 Day:"}),t("span",{className:"ml-3 text-base font-bold",children:["₹",(i==null?void 0:i.writing_1day_cost).toLocaleString("en-US",{style:"currency",currency:"INR"})]})]})]}),e("p",{className:"leading-relaxed text-lg mb-4 mt-20",children:"The cost mentioned above is exclusive of delivery charges and content finding charges."})]}),e("button",{onClick:he,className:`flex mx-auto mt-16 rounded-full text-white ${b==="View Contact"?"bg-green-500":"bg-indigo-400"} border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600  text-lg`,children:b})]}),e("div",{className:"sm:w-4/5  sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left",children:t("ul",{className:"flex flex-col gap-5 text-lg pl-10 pr-20 mb-4",children:[t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"Assignment Types"}),t("span",{className:" text-base flex-wrap gap-2 flex",children:[((R=l==null?void 0:l.writer_domains)==null?void 0:R.writing)===1?e("span",{className:"p-1 px-2 text-base font-semibold text-white rounded-full shadow-xl bg-blue141",children:"Writing"}):null,((T=l==null?void 0:l.writer_domains)==null?void 0:T.diagrams)===1?e("span",{className:"p-1 px-2 text-base font-semibold text-white rounded-full shadow-xl bg-blue141",children:"Diagrams"}):null,((P=l==null?void 0:l.writer_domains)==null?void 0:P.technical_drawing)===1?e("span",{className:"p-1 px-2 text-base font-semibold text-white rounded-full shadow-xl bg-blue141",children:"Engineering Drawing"}):null,(($=l==null?void 0:l.writer_domains)==null?void 0:$.typing)===1?e("span",{className:"p-1 px-2 text-base font-semibold text-white rounded-full shadow-xl bg-blue141",children:"Typing"}):null,((z=l==null?void 0:l.writer_domains)==null?void 0:z.art_and_craft)===1?e("span",{className:"p-1 px-2 text-base font-semibold text-white rounded-full shadow-xl bg-blue141",children:"Art & Craft"}):null]})]}),((M=l==null?void 0:l.writer_domains)==null?void 0:M.writing)===1&&t(d,{children:[t("li",{className:"flex items-center justify-center",children:[e("hr",{className:"w-full h-1 my-8 bg-gray-300 border-0  rounded-full"}),e("span",{className:"absolute mb-2 py-1 px-3 font-medium text-gray-900  bg-white bg-opacity-50 backdrop-blur-lg rounded-full drop-shadow-lg ",children:"Writing Section"})]})," ",t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"Writting Speed"}),t("span",{className:"ml-3 text-base ",children:[i==null?void 0:i.writer_capacity," sides/day"]})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"Writting Sample"}),e("button",{onClick:()=>{w("writing")},className:"ml-3 text-base text-indigo-500",children:"Download"})]})]}),((U=l==null?void 0:l.writer_domains)==null?void 0:U.diagrams)===1&&t(d,{children:[t("li",{className:"flex items-center justify-center",children:[e("hr",{className:"w-full h-1 my-8 bg-gray-300 border-0  rounded-full"}),e("span",{className:"absolute mb-2 py-1 px-3 font-medium text-gray-900  bg-white bg-opacity-50 backdrop-blur-lg rounded-full drop-shadow-lg ",children:"Drawing Section"})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"Drawing Cost"}),t("span",{className:"ml-3 text-base ",children:["₹",(B=C==null?void 0:C.diagram_cost)==null?void 0:B.toLocaleString("en-US",{style:"currency",currency:"INR"}),"/ diagram"]})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"Drawing Sample"}),e("button",{onClick:()=>{w("diagram")},className:"ml-3 text-base text-indigo-500",children:"Download"})]})]}),((O=l==null?void 0:l.writer_domains)==null?void 0:O.technical_drawing)===1&&t(d,{children:[" ",t("li",{className:"flex items-center justify-center",children:[e("hr",{className:"w-full h-1 my-8 bg-gray-300 border-0  rounded-full"}),e("span",{className:"absolute mb-2 py-1 px-3 font-medium text-gray-900  bg-white bg-opacity-50 backdrop-blur-lg rounded-full drop-shadow-lg ",children:"ED Section"})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"ED Cost"}),t("span",{className:"ml-3 text-base ",children:["₹",(V=S==null?void 0:S.ed_cost)==null?void 0:V.toLocaleString("en-US",{style:"currency",currency:"INR"}),"/ ED Sheet"]})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"ED Sample"}),e("button",{onClick:()=>{w("ed")},className:"ml-3 text-base text-indigo-500",children:"Download"})]})]}),((H=l==null?void 0:l.writer_domains)==null?void 0:H.art_and_craft)===1&&t(d,{children:[" ",t("li",{className:"flex items-center justify-center",children:[e("hr",{className:"w-full h-1 my-8 bg-gray-300 border-0  rounded-full"}),e("span",{className:"absolute mb-2 py-1 px-3 font-medium text-gray-900  bg-white bg-opacity-50 backdrop-blur-lg rounded-full drop-shadow-lg ",children:"Art & Craft Section"})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"Art & Craft Models"}),e("span",{className:" text-base flex-wrap gap-2 flex",children:(q=f==null?void 0:f.art_type_of_models)==null?void 0:q.split(",").map((a,s)=>e("span",{className:"p-1 px-2 text-xs font-semibold text-white rounded-full shadow-xl bg-blue918",children:a},s))})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"Art & Craft Cost"}),t("span",{className:"ml-3 text-base ",children:["₹",(G=f==null?void 0:f.art_cost)==null?void 0:G.toLocaleString("en-US",{style:"currency",currency:"INR"}),"/ Project"]})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"Art & Craft Sample"}),e("button",{onClick:()=>{w("art")},className:"ml-3 text-base text-indigo-500",children:"Download"})]})]}),((Z=l==null?void 0:l.writer_domains)==null?void 0:Z.typing)===1&&t(d,{children:[" ",t("li",{className:"flex items-center justify-center",children:[e("hr",{className:"w-full h-1 my-8 bg-gray-300 border-0  rounded-full"}),e("span",{className:"absolute mb-2 py-1 px-3 font-medium text-gray-900  bg-white bg-opacity-50 backdrop-blur-lg rounded-full drop-shadow-lg ",children:"Typing Section"})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"Typing Speed"}),t("span",{className:"ml-3 text-base ",children:[m==null?void 0:m.typing_speed," pages/day"]})]}),t("li",{className:"flex items-center justify-between",children:[e("span",{className:"flex  items-center  h-6  font-bold rounded-full  sm:h-7 px-2",children:"Typing Cost"}),t("span",{className:"ml-3 text-base ",children:["₹",(J=m==null?void 0:m.typing_cost)==null?void 0:J.toLocaleString("en-US",{style:"currency",currency:"INR"}),"/ Page"]})]})]}),t("li",{className:"flex items-center justify-center",children:[e("hr",{className:"w-full h-1 my-8 bg-gray-300 border-0  rounded-full"}),e("span",{className:"absolute mb-2 py-1 px-3 font-medium text-gray-900  bg-white bg-opacity-50 backdrop-blur-lg rounded-full drop-shadow-lg ",children:"Bio"})]}),e("li",{className:"flex items-start justify-between",children:e("span",{className:"ml-3 text-base ",children:l==null?void 0:l.writer_bio})})]})})]})})})}),e(ee,{"aria-labelledby":"transition-modal-title","aria-describedby":"transition-modal-description",open:E,onClose:ue,closeAfterTransition:!0,children:e(le,{in:E,children:t(te,{sx:ae,children:[" ",e("div",{className:"w-full text-gray-600 ",children:e("div",{className:"flex flex-wrap ",children:e("div",{className:"w-full p-4",children:t("div",{className:"flex flex-col p-8 border-2 border-gray-200 border-opacity-50 rounded-lg sm:flex-row",children:[e("div",{className:"inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mb-4 text-indigo-500 bg-indigo-100 rounded-full sm:mr-8 sm:mb-0",children:e(De,{size:30})}),t("div",{className:"flex-grow flex-col flex items-start justify-start",children:[e("span",{className:"flex-grow flex flex-col",children:t("span",{className:"mt-1 text-base font-medium text-gray-900 capitalize",children:["Download Sample Files for ",j]})}),(Y=(X=(Q=(K=l==null?void 0:l[j])==null?void 0:K.sample_file)==null?void 0:Q.split("_$_"))==null?void 0:X.filter(a=>a!==""))==null?void 0:Y.map((a,s)=>t("div",{className:"flex-grow flex items-center justify-between gap-5",children:[e("p",{className:"text-base leading-relaxed flex text-left",children:a}),e("button",{onClick:()=>xe(a),className:"flex items-center justify-center  text-indigo-500",children:e(ve,{size:20})})]},s))]})]})})})})]})})}),e(ee,{"aria-labelledby":"transition-modal-title","aria-describedby":"transition-modal-description",open:F,onClose:N,closeAfterTransition:!0,children:e(le,{in:F,children:t(te,{sx:ae,children:[" ",e("div",{className:"w-full text-gray-600 ",children:e("div",{className:"flex flex-wrap ",children:e("div",{className:"w-full p-4",children:me?t("div",{className:"flex items-center justify-center",children:[e(ye,{sx:{color:"#918EF4"},thickness:5}),e("p",{className:"ml-2",children:"Please wait..."})]}):t("div",{className:"flex flex-col p-8 border-2 border-gray-200 border-opacity-50 rounded-lg sm:flex-row",children:[e("div",{className:"inline-flex items-center justify-center flex-shrink-0 w-16 h-16 mb-4 text-indigo-500 bg-indigo-100 rounded-full sm:mr-8 sm:mb-0",children:e(_e,{size:30})}),t("div",{className:"flex-grow",children:[t("h2",{className:"mb-3 text-lg font-medium text-gray-900 title-font",children:["Writer ID : ",g]}),t("p",{className:"text-base leading-relaxed",children:["Wallet Balance :"," ",t("strong",{children:[l==null?void 0:l.user_wallet," Coins"]})]}),t("p",{className:"text-base leading-relaxed flex",children:["Coins Required :",t("strong",{className:"ml-1 flex ",children:[l==null?void 0:l.cost," Coins"]})]}),e("p",{className:"text-base leading-relaxed flex",children:(l==null?void 0:l.user_wallet)>(l==null?void 0:l.cost)?t("span",{className:"flex items-center ml-1 text-green-500",children:[e(Ce,{size:20}),e("span",{className:"ml-1 ",children:"Sufficient Coins"})]}):t("span",{className:"flex items-center ml-1 text-red-500",children:[e(je,{size:20}),e("span",{className:"ml-1 ",children:"Insufficient Coins"})]})}),t("button",{onClick:pe,className:"flex items-center justify-center mt-3 text-indigo-500",children:[e("span",{className:"mr-2",children:"Continue to Payment"}),e(Se,{size:20})]})]})]})})})})]})})})]})}export{Be as default};