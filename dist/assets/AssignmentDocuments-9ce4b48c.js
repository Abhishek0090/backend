import{a as r}from"./react-ef3399cd.js";import{u as V,v as x}from"./freelancerSlice-d7c5526c.js";import{a as A}from"./axios-a900fd7e.js";import{_ as g,a5 as tt,a6 as et,a7 as nt,a8 as at}from"./main-7cd5216e.js";import{e as it,f as st,g as lt,h as ot}from"./studentApiSlice-462f996f.js";import{a as i,F as mt,j as a}from"./createLucideIcon-5244bfd8.js";import{X as dt}from"./x-d8df971e.js";import{L as ct}from"./loader-2-b93b986b.js";import{C as rt,A as ut}from"./chevron-left-7fef36cd.js";import"./array-cc2e2e42.js";import"./formik.esm-48e41763.js";import"./Box-a7bad236.js";const _=5;function vt({nextHandler:w,prevStepHandler:T,roles:p}){const y=V(),N=x(n=>n.student.writingAssignmentDetails),S=x(n=>n.student.technicalDrawingAssignmentDetails),D=x(n=>n.student.typingAssignmentDetails),v=x(n=>n.student.artAndCraftAssignmentDetails),[u,C]=r.useState([]),[gt,I]=r.useState(!1),[k,f]=r.useState(!1),[L,M]=r.useState(null),[F,j]=r.useState(null),[q,O]=r.useState(null),[U,W]=r.useState(null),[B,P]=r.useState([]),[z,E]=r.useState([]),[H,J]=r.useState([]),[X,Y]=r.useState([]),[Z]=it(),[$]=st(),[R]=lt(),[G]=ot();console.log(p);const K=n=>{let e=[...u],b=!1;if(f(!0),n.forEach(s=>{e.length<_?e.push(s):b=!0}),C(e),p==="Hand Written"){let s=JSON.parse(localStorage.getItem("assignment_files_random_number_writing")),h={writing_assignment:e,submit:"submit",random_number:s||L};A.post("http://localhost/blue-pen-backend/api/student/fileuploadsubmitassignmentwriting.php",h,{headers:{"Content-Type":"multipart/form-data"}}).then(t=>{var l,o,m,d,c;M((l=t==null?void 0:t.data)==null?void 0:l.random_number),localStorage.setItem("assignment_files_random_number_writing",(o=t==null?void 0:t.data)==null?void 0:o.random_number),P((m=t==null?void 0:t.data)==null?void 0:m.file_name),window.localStorage.setItem("saved_files_assignments_writing",B),y(tt({...N,submit:"submit",assignment_files:(d=t==null?void 0:t.data)==null?void 0:d.file_name_string,assignment_files_random_number:(c=t==null?void 0:t.data)==null?void 0:c.random_number})),console.log(t)}).catch(t=>{console.log(t)})}else if(p==="Technical Drawing"){let s=JSON.parse(localStorage.getItem("assignment_files_random_number_technical_drawing")),h={ed_assignment:e,submit:"submit",random_number:s||F};A.post("http://localhost/blue-pen-backend/api/student/fileuploadsubmitassignmented.php",h,{headers:{"Content-Type":"multipart/form-data"}}).then(t=>{var l,o,m,d,c;j((l=t==null?void 0:t.data)==null?void 0:l.random_number),localStorage.setItem("assignment_files_random_number_technical_drawing",(o=t==null?void 0:t.data)==null?void 0:o.random_number),E((m=t==null?void 0:t.data)==null?void 0:m.file_name),window.localStorage.setItem("saved_files_assignments_technical_drawing",z),y(et({...S,submit:"submit",assignment_files:(d=t==null?void 0:t.data)==null?void 0:d.file_name_string,assignment_files_random_number:(c=t==null?void 0:t.data)==null?void 0:c.random_number})),console.log(t)}).catch(t=>{console.log(t)})}else if(p==="Content Typing"){let s=JSON.parse(localStorage.getItem("assignment_files_random_number_typing")),h={typing_assignment:e,submit:"submit",random_number:s||q};A.post("http://localhost/blue-pen-backend/api/student/fileuploadsubmitassignmenttyping.php",h,{headers:{"Content-Type":"multipart/form-data"}}).then(t=>{var l,o,m,d,c;O((l=t==null?void 0:t.data)==null?void 0:l.random_number),localStorage.setItem("assignment_files_random_number_typing",(o=t==null?void 0:t.data)==null?void 0:o.random_number),J((m=t==null?void 0:t.data)==null?void 0:m.file_name),window.localStorage.setItem("saved_files_assignments_typing",H),y(nt({...D,submit:"submit",assignment_files:(d=t==null?void 0:t.data)==null?void 0:d.file_name_string,assignment_files_random_number:(c=t==null?void 0:t.data)==null?void 0:c.random_number})),console.log(t)}).catch(t=>{console.log(t)})}else if(p==="Art & Craft"){let s=JSON.parse(localStorage.getItem("assignment_files_random_number_art")),h={art_and_craft_assignment:e,submit:"submit",random_number:s||U};A.post("http://localhost/blue-pen-backend/api/student/fileuploadsubmitassignmentartandcraft.php",h,{headers:{"Content-Type":"multipart/form-data"}}).then(t=>{var l,o,m,d,c;W((l=t==null?void 0:t.data)==null?void 0:l.random_number),localStorage.setItem("assignment_files_random_number_art",(o=t==null?void 0:t.data)==null?void 0:o.random_number),Y((m=t==null?void 0:t.data)==null?void 0:m.file_name),window.localStorage.setItem("saved_files_assignments_art",X),y(at({...v,submit:"submit",assignment_files:(d=t==null?void 0:t.data)==null?void 0:d.file_name_string,assignment_files_random_number:(c=t==null?void 0:t.data)==null?void 0:c.random_number})),console.log(t)}).catch(t=>{console.log(t)})}f(!1),I(!!b)},Q=()=>{if(f(!0),p==="Hand Written"){let n={...N};Z(n).unwrap().then(e=>{console.log(e),g.success("Assignment submitted successfully"),w()}).catch(e=>{console.log(e),g.error("Something went wrong")})}else if(p==="Technical Drawing"){let n={...S};$(n).unwrap().then(e=>{console.log(e),g.success("Assignment submitted successfully"),w()}).catch(e=>{console.log(e),g.error("Something went wrong")})}else if(p==="Content Typing"){let n={...D};R(n).unwrap().then(e=>{console.log(e),g.success("Assignment submitted successfully"),w()}).catch(e=>{console.log(e),g.error("Something went wrong")})}else if(p==="Art & Craft"){let n={...v};G(n).unwrap().then(e=>{console.log(e),g.success("Assignment submitted successfully"),w()}).catch(e=>{console.log(e),g.error("Something went wrong")})}f(!1)};return i(mt,{children:[i("section",{id:"upload",children:[a("label",{className:"block mt-4 mb-2 text-xl font-medium ",children:"Upload assignment guidelines and other related files"}),i("div",{className:"flex flex-col gap-2 md:w-[45rem] w-[20rem] items-center justify-center mt-4 mb-2",children:[(u==null?void 0:u.length)>=_?null:i("label",{htmlFor:"dropzone-file",className:"flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 hover:bg-gray-100 ",children:[u.length===0?i("div",{className:"flex flex-col items-center justify-center pt-5 pb-6",children:[a("svg",{"aria-hidden":"true",className:"w-10 h-10 mb-3 text-gray-400",fill:"none",stroke:"currentColor",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg",children:a("path",{strokeLinecap:"round",strokeLinejoin:"round",strokeWidth:"2",d:"M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"})}),i("p",{className:"mb-2 text-sm text-gray-500 ",children:[a("span",{className:"font-semibold",children:"Upload assignment guidelines and other related files"})," ","(Can upload multiple files)"]}),a("p",{className:"text-xs text-gray-500 ",children:"PDF, DOC, DOCX, ZIP ,etc up to 10MB"})]}):i("div",{className:"flex flex-col items-center justify-center pt-5 pb-6",children:[a("svg",{"aria-hidden":"true",className:"w-10 h-10 mb-3 text-gray-400",fill:"none",stroke:"currentColor",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg",children:a("path",{strokeLinecap:"round",strokeLinejoin:"round",strokeWidth:"2",d:"M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"})}),i("p",{className:"mb-2 text-sm text-blue918 ",children:[a("span",{className:"font-semibold",children:"Add more assignment guidelines and other related files"})," ","(Max 5 files)"]}),a("p",{className:"text-xs text-gray-500 ",children:"PDF, DOC, DOCX, ZIP ,etc up to 10MB"})]}),a("input",{multiple:!0,id:"dropzone-file",type:"file",className:"hidden",onChange:n=>{f(!0);let e=[...n.target.files];if(console.log("files :>> ",e),e.length>_){g.error(`You can upload only ${_} files`),f(!1);return}if(e.length+u.length>_){g.error(`You can upload only ${_} files`),f(!1);return}K(e)}})]}),u==null?void 0:u.map((n,e)=>i("div",{className:"flex items-center  justify-between w-full bg-gray-200 text-gray-800 px-2 rounded-lg my-0.5",children:[i("span",{className:"p-1 rounded-lg ",children:[e+1,". ",n==null?void 0:n.name]}),a("button",{onClick:()=>{let b=[...u];b.splice(e,1),C(b)},className:"m-1 leading-none text-white bg-red-500 rounded-full hover:text-gray-100 hover:bg-red-600",children:a(dt,{size:20})})]},e)),k?i("div",{role:"status",children:[a(ct,{size:20,className:"animate-spin"}),a("span",{className:"sr-only",children:"Loading..."})]}):null]})]}),i("div",{className:"flex flex-row gap-4 mt-5",children:[i("button",{onClick:()=>{T()},className:"flex flex-row items-center justify-center w-32 py-1 mt-5 mb-10 text-lg rounded-full right-10 md:font-SemiBold md:text-xl text-blue918 md:py-3 md:w-48",children:[a("span",{className:"items-center px-2 ",children:a(rt,{className:"w-5 h-5 mr-2"})}),a("span",{className:"ml-1 md:ml-2",children:"Prev"})]}),i("button",{onClick:Q,className:"flex flex-row items-center justify-center w-32 py-1 mt-5 mb-10 text-lg text-white rounded-full bg-blue141 right-10 md:font-SemiBold md:text-xl md:py-3 md:w-48",children:[a("span",{className:"mr-1 md:mr-2",children:"Assign"}),a("span",{className:"items-center px-2 ",children:a(ut,{className:"w-5 h-5 ml-2"})})]})]})]})}export{vt as default};
