import{t as u,v as r,w,x as b,y as x,z as c}from"./main-7cd5216e.js";import{a as n}from"./react-ef3399cd.js";import{d as v}from"./chevron-left-7fef36cd.js";import{j as e,F as k,a as d}from"./createLucideIcon-5244bfd8.js";import"./array-cc2e2e42.js";import"./formik.esm-48e41763.js";import"./freelancerSlice-d7c5526c.js";import"./Box-a7bad236.js";import"./axios-a900fd7e.js";import"./x-d8df971e.js";const y=n.lazy(()=>r(()=>import("./Samples-3383c41b.js"),["assets/Samples-3383c41b.js","assets/react-ef3399cd.js","assets/axios-a900fd7e.js","assets/freelancerSlice-d7c5526c.js","assets/createLucideIcon-5244bfd8.js","assets/file-plus-2-e83cd430.js","assets/x-d8df971e.js","assets/loader-2-b93b986b.js"])),S=n.lazy(()=>r(()=>import("./Costing-8d15ba58.js"),["assets/Costing-8d15ba58.js","assets/react-ef3399cd.js","assets/formik.esm-48e41763.js","assets/createLucideIcon-5244bfd8.js","assets/freelancerSlice-d7c5526c.js","assets/chevron-left-7fef36cd.js","assets/check-circle-537067c2.js","assets/Box-a7bad236.js","assets/Slider-b3a1e43a.js","assets/visuallyHidden-14c3de6e.js"])),_=[{id:1,name:"Hand Written",img:w},{id:2,name:"Diagram/Flowchart",img:b},{id:3,name:"Technical Drawing",img:x},{id:4,name:"Art and Craft",img:c},{id:5,name:"Typing",img:c}],I={hidden:{opacity:1,scale:0},visible:{opacity:1,scale:1,transition:{delayChildren:.3,staggerChildren:.2}}};function z(){var o,m;const[p,g]=n.useState(!1),[i,f]=n.useState([]),l=v();return n.useEffect(()=>{if(localStorage.getItem("form")){let a=JSON.parse(localStorage.getItem("form"));a=Object.assign({},...a),f([...a.Step2.split(",").map(t=>{var s;return{id:(s=_.find(h=>h.name===t))==null?void 0:s.id,sublinks:t.toLowerCase().replace(" ","").replace("/","").replace(" ",""),originalName:t}})])}else console.log("no form found"),l("/freelance")},[localStorage.getItem("form")]),i.sort((a,t)=>a.id-t.id),e(k,{children:d(u.div,{variants:I,initial:"hidden",animate:"visible",className:"backdrop-blur-2xl  drop-shadow shadow-2xl rounded-xl py-5  flex-col bg-white bg-opacity-20  max-w-[70rem] mt-2 mb-2 mx-auto flex   px-5 md:px-0  items-center",children:[e("div",{className:"p-4 space-y-2  md:w-[50rem] w-[20rem]",children:e("div",{className:"flex items-center justify-center max-w-3xl space-x-3",children:i==null?void 0:i.map(a=>{var t;return d("div",{className:"flex flex-col",children:[(a==null?void 0:a.sublinks)===window.location.pathname.split("/")[3]?e("h3",{className:"font-semibold text-base ",children:(t=i==null?void 0:i.find(s=>(s==null?void 0:s.sublinks)===window.location.pathname.split("/")[3]))==null?void 0:t.originalName}):e("h3",{className:"font-semibold text-xl h-7 "}),e("span",{onClick:()=>{l(`/freelance/freelancer/${a==null?void 0:a.sublinks}`)},className:`w-36 h-2 rounded-sm  cursor-pointer
                ${(a==null?void 0:a.sublinks)===window.location.pathname.split("/")[3]?"bg-blue918":"bg-gray-200"}
                `},a==null?void 0:a.id)]})})})}),e(n.Suspense,{fallback:e("div",{}),children:e(y,{loading:p,setLoading:g,roles:i,roleSublinkID:(o=i.find(a=>(a==null?void 0:a.sublinks)===window.location.pathname.split("/")[3]))==null?void 0:o.id})}),e(n.Suspense,{fallback:e("div",{}),children:e(S,{roles:i,roleSublinkID:(m=i==null?void 0:i.find(a=>(a==null?void 0:a.sublinks)===window.location.pathname.split("/")[3]))==null?void 0:m.id})})]})})}export{z as default};
