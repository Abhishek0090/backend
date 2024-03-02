import{t as I,v as y}from"./main-ee249c94.js";import{a}from"./react-ef3399cd.js";import{d as H}from"./chevron-left-7fef36cd.js";import{a as R}from"./axios-a900fd7e.js";import{C as v}from"./Checkboxes-bda44b49.js";import{u as X,x as S}from"./freelancerSlice-d7c5526c.js";import G from"./PersonalDetails-f5d62603.js";import{j as t,F as K,a as p}from"./createLucideIcon-5244bfd8.js";import"./array-cc2e2e42.js";import"./formik.esm-48e41763.js";import"./Box-a7bad236.js";import"./x-d8df971e.js";import"./freelancerApiSlice-1d038121.js";import"./RadioGroup-7023bd10.js";import"./Radio-03d37e9c.js";import"./FormGroup-5f8dff9d.js";import"./loader-2-b93b986b.js";const Q=a.lazy(()=>y(()=>import("./Speciality-ab8db01a.js"),["assets/Speciality-ab8db01a.js","assets/react-ef3399cd.js","assets/array-cc2e2e42.js","assets/formik.esm-48e41763.js","assets/createLucideIcon-5244bfd8.js","assets/freelancerSlice-d7c5526c.js","assets/Tags-fec3723a.js","assets/check-circle-537067c2.js","assets/file-plus-2-e83cd430.js","assets/x-d8df971e.js","assets/loader-2-b93b986b.js"])),W=a.lazy(()=>y(()=>import("./Experience-6807fea6.js"),["assets/Experience-6807fea6.js","assets/formik.esm-48e41763.js","assets/createLucideIcon-5244bfd8.js","assets/react-ef3399cd.js","assets/freelancerSlice-d7c5526c.js","assets/array-cc2e2e42.js","assets/chevron-left-7fef36cd.js"])),Y=a.lazy(()=>y(()=>import("./Resume-71895f4d.js"),["assets/Resume-71895f4d.js","assets/react-ef3399cd.js","assets/createLucideIcon-5244bfd8.js","assets/chevron-left-7fef36cd.js","assets/x-d8df971e.js"])),Z=5,$=1,A={hidden:{opacity:1,scale:0},visible:{opacity:1,scale:1,transition:{delayChildren:.3,staggerChildren:.2}}};function _e(){const x=X(),[g,k]=a.useState([]),[b,N]=a.useState([]);a.useState([]);const[ee,u]=a.useState(!1),[L,c]=a.useState(!1),[h,O]=a.useState([]),[z,T]=a.useState([]),[r,te]=a.useState(2),[D,U]=a.useState(null),[j,q]=a.useState(null),[B,M]=a.useState([]),i=H(),[ae,P]=a.useState({Step1:"none",Step2:"none",Step3:"none"});a.useEffect(()=>{if(localStorage.getItem("form")){let n=JSON.parse(localStorage.getItem("form"));P(n.reduce((l,s)=>({...l,[Object.keys(s)[0]]:Object.values(s)[0]}),{})),O([...n[2].Step3.split(",")]),x(S({domains:n[2].Step3.split(",").toString()}))}else console.log("no form found"),i("/freelance")},[localStorage.getItem("form")]);const J=n=>{let l=[...g],s=!1;c(!0),n.forEach(e=>{l.length<Z?l.push(e):s=!0}),k(l);let o=JSON.parse(localStorage.getItem("random_number_past_work")),_={past_work_files:l,submit:"submit",random_number:o||D};R.post("https://test.bluepen.co.in/api/freelancer/fileuploadpastworkfiles.php",_,{headers:{"Content-Type":"multipart/form-data"}}).then(e=>{var m,d,f,F;U((m=e==null?void 0:e.data)==null?void 0:m.random_number),localStorage.setItem("random_number_past_work",(d=e==null?void 0:e.data)==null?void 0:d.random_number),M((f=e==null?void 0:e.data)==null?void 0:f.file_name),window.localStorage.setItem("saved_files",B),x(S({past_work_files:(F=e==null?void 0:e.data)==null?void 0:F.file_name_string})),console.log(e)}).catch(e=>{console.log(e)}),c(!1),u(!!s)},V=n=>{let l=[...b],s=!1;c(!0),n.forEach(e=>{l.length<$?l.push(e):s=!0}),N(l);let o=JSON.parse(localStorage.getItem("random_number_resume")),_={resume:l,submit:"submit",random_number:o||j};R.post("https://test.bluepen.co.in/api/freelancer/fileuploadresume.php",_,{headers:{"Content-Type":"multipart/form-data"}}).then(e=>{var m,d,f;q((m=e==null?void 0:e.data)==null?void 0:m.random_number),localStorage.setItem("random_number_resume",(d=e==null?void 0:e.data)==null?void 0:d.random_number),x(S({resume:(f=e==null?void 0:e.data)==null?void 0:f.file_name_string})),console.log(e)}).catch(e=>{console.log(e)}),c(!1),u(!!s)},w=[];h.forEach(n=>{var s;let l=v.findIndex(o=>o.name===n);(s=v[l])==null||s.checkboxes.forEach(o=>{w.includes(o.name)||w.push(o.name)})});const E=()=>{r===1&&i("/freelance/freelancer/technical/step2"),r===2&&i("/freelance/freelancer/technical/step3")},C=()=>{r===2&&i("/freelance/freelancer/technical/step1"),r===3&&i("/freelance/freelancer/technical/step2")};return t(K,{children:r===4?t(a.Suspense,{fallback:t("div",{}),children:t(G,{uploadedFiles:g,resumeFiles:b})}):p(I.div,{variants:A,initial:"hidden",animate:"visible",className:"backdrop-blur-2xl  drop-shadow shadow-2xl rounded-xl py-10 md:my-10 flex-col bg-white bg-opacity-20  max-w-[70rem] mt-8 mb-6 mx-auto flex   px-5 md:px-0  items-center",children:[" ",t("div",{className:"flex flex-col items-center justify-center gap-2 md:flex-row",children:h==null?void 0:h.filter(n=>v.map(l=>l.name).includes(n)).map((n,l)=>t(I.div,{variants:A,initial:"hidden",animate:"visible",className:" py-5 max-w-[65rem] mx-auto flex md:flex-row flex-col px-2 md:px-0 justify-between items-center",children:t("button",{className:"flex-col max-w-sm px-10 bg-white border border-gray-200 rounded-lg shadow-2xl  backdrop-blur-3xl",children:t("div",{className:"p-2",children:t("h5",{className:"mb-2 text-2xl font-bold tracking-tight text-gray-900 ",children:n})})})},l))}),p("ol",{className:"flex items-center md:w-[50rem] w-[20rem] text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base",children:[t("li",{style:{color:r===1?"#918EF4":"#9CA3AF"},className:"flex md:w-full items-center   sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700",children:p("span",{onClick:()=>{i("/freelance/freelancer/technical/step1")},className:"flex cursor-pointer items-center after:content-['/'] sm:after:hidden after:mx-2 after:font-light after:text-gray-200 dark:after:text-gray-500",children:[r===1?t("svg",{"aria-hidden":"true",className:"w-4 h-4 mr-2 sm:w-5 sm:h-5",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg",children:t("path",{fillRule:"evenodd",d:"M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z",clipRule:"evenodd"})}):t("span",{className:"mr-2",children:"1"}),"Speciality"]})}),t("li",{style:{color:r===2?"#918EF4":"#9CA3AF"},className:"flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700",children:t("span",{className:"flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:font-light after:text-gray-200 dark:after:text-gray-500",children:p("span",{onClick:()=>{i("/freelance/freelancer/technical/step2")},className:"flex cursor-pointer items-center after:content-['/'] sm:after:hidden after:mx-2 after:font-light after:text-gray-200 dark:after:text-gray-500",children:[r===2?t("svg",{"aria-hidden":"true",className:"w-4 h-4 mr-2 sm:w-5 sm:h-5",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg",children:t("path",{fillRule:"evenodd",d:"M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z",clipRule:"evenodd"})}):t("span",{className:"mr-2",children:"2"}),"Experience"]})})}),t("li",{style:{color:r===3?"#918EF4":"#9CA3AF"},className:"flex items-center",children:p("span",{onClick:()=>{i("/freelance/freelancer/technical/step3")},className:"flex cursor-pointer items-center after:content-['/'] sm:after:hidden after:mx-2 after:font-light after:text-gray-200 dark:after:text-gray-500",children:[r===3?t("svg",{"aria-hidden":"true",className:"w-4 h-4 mr-2 sm:w-5 sm:h-5",fill:"currentColor",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg",children:t("path",{fillRule:"evenodd",d:"M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z",clipRule:"evenodd"})}):t("span",{className:"mr-2",children:"3"}),"Resume"]})})]}),r===1&&t(a.Suspense,{fallback:t("div",{}),children:t(Q,{nextStepHandler:E,loading:L,setLoading:c,uploadedFiles:g,handleUploadFiles:J,setUploadedFiles:k,relevantCheckboxes:w,checkBoxes:z,setCheckBoxes:T})}),r===2&&t(a.Suspense,{fallback:t("div",{}),children:t(W,{prevStepHandler:C,nextStepHandler:E})}),r===3&&t(a.Suspense,{fallback:t("div",{}),children:t(Y,{handleUploadResume:V,resumeFiles:b,setResumeFiles:N,prevStepHandler:C})})]})})}export{_e as default};
