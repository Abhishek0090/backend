import{a as p}from"./react-ef3399cd.js";import{v as h}from"./freelancerSlice-d7c5526c.js";import{r as f,a0 as g,a1 as b,a2 as N}from"./main-ee249c94.js";import{h as y}from"./moment-fbc5633a.js";import{c as o,j as e,F as d,a as t}from"./createLucideIcon-5244bfd8.js";import{B as w}from"./Box-a7bad236.js";import{u as v,a as q}from"./studentApiSlice-ddff0128.js";import{d as j}from"./chevron-left-7fef36cd.js";import{C as n}from"./coins-f267a9f8.js";import"./array-cc2e2e42.js";import"./formik.esm-48e41763.js";import"./axios-a900fd7e.js";import"./x-d8df971e.js";const r=o("Edit",[["path",{d:"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7",key:"1qinfi"}],["path",{d:"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z",key:"1cs3r3"}]]),A=o("PlusCircle",[["circle",{cx:"12",cy:"12",r:"10",key:"1mglay"}],["line",{x1:"12",y1:"8",x2:"12",y2:"16",key:"55jlg"}],["line",{x1:"8",y1:"12",x2:"16",y2:"12",key:"1myapg"}]]),L={bgcolor:"background.paper",border:"2px solid #918EF4",boxShadow:24,p:4,margin:"10px 100px",height:"auto",borderRadius:"1rem"},m=[{id:1,date:new Date("2021-01-01T00:00:00.000Z"),category:"Snow",tags:["Essay Writing","developer"],pm:"John Doe",number:"+91 1234567890",description:"Amet ipsum nulla laborum cillum amet irure nulla eu pariatur sint ut. Occaecat tempor ut sint pariatur sit et consectetur.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:2,date:new Date("2021-02-01T00:00:00.000Z"),category:"Lannister",tags:["Report"],pm:"John Doe",number:"+91 1234567890",description:"Amet quis reprehenderit nulla consequat irure enim commodo amet proident fugiat Lorem. Nulla qui nulla Lorem aliqua sit.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:3,date:new Date("2021-03-01T00:00:00.000Z"),category:"Lannister",tags:["Report"],pm:"Jane Doe",number:"+91 1234567890",description:"Aliquip minim eu sint cillum magna esse veniam occaecat nulla deserunt dolore. In anim duis labore quis ullamco occaecat in veniam.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:4,date:new Date("2021-04-01T00:00:00.000Z"),category:"Stark",tags:["cool","teacher"],pm:"Jane Doe",number:"+91 1234567890",description:"Sit laboris irure commodo do magna. Esse non do irure minim cillum.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:5,date:new Date("2021-05-01T00:00:00.000Z"),category:"Targaryen",tags:["Essay Writing","developer"],pm:"John Doe",number:"+91 1234567890",description:"Ea dolore non Lorem minim qui elit esse est. Lorem proident excepteur commodo qui elit do.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:6,date:new Date("2021-06-01T00:00:00.000Z"),category:"Melisandre",tags:["Report"],pm:"John Doe",number:"+91 1234567890",description:"Sunt ad laboris occaecat proident. Do tempor fugiat commodo culpa qui tempor cillum incididunt consectetur esse deserunt proident sit ullamco.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:7,date:new Date("2021-07-01T00:00:00.000Z"),category:"Clifford",tags:["Report"],pm:"Jane Doe",number:"+91 1234567890",description:"Occaecat nulla id nostrud consequat sunt Lorem id ut. Amet proident laboris dolor non exercitation reprehenderit in nulla labore minim id minim.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:8,date:new Date("2021-01-01T00:00:00.000Z"),category:"Frances",tags:["cool","teacher"],pm:"Jane Doe",number:"+91 1234567890",description:"Veniam occaecat velit minim non ex pariatur aliquip. Dolor magna proident irure adipisicing incididunt proident aliquip ullamco ex tempor.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:9,date:new Date("2021-01-01T00:00:00.000Z"),category:"Roxie",tags:["Essay Writing","developer"],pm:"John Doe",number:"+91 1234567890",description:"Non laborum dolore qui nulla incididunt aliquip ea sint incididunt. Ex do elit est proident cillum consectetur.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:10,date:new Date("2021-01-01T00:00:00.000Z"),category:"Roxie",tags:["Essay Writing","developer"],pm:"John Doe",number:"+91 1234567890",description:"Non laborum dolore qui nulla incididunt aliquip ea sint incididunt. Ex do elit est proident cillum consectetur.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:11,date:new Date("2021-01-01T00:00:00.000Z"),category:"Roxie",tags:["Essay Writing","developer"],pm:"John Doe",number:"+91 1234567890",description:"Non laborum dolore qui nulla incididunt aliquip ea sint incididunt. Ex do elit est proident cillum consectetur.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:12,date:new Date("2021-01-01T00:00:00.000Z"),category:"Roxie",tags:["Essay Writing","developer"],pm:"John Doe",number:"+91 1234567890",description:"Non laborum dolore qui nulla incididunt aliquip ea sint incididunt. Ex do elit est proident cillum consectetur.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"},{id:13,date:new Date("2021-01-01T00:00:00.000Z"),category:"Roxie",tags:["Essay Writing","developer"],pm:"John Doe",number:"+91 1234567890",description:"Non laborum dolore qui nulla incididunt aliquip ea sint incididunt. Ex do elit est proident cillum consectetur.",title:"Lorem Aliquip ut cillum reprehenderit cillum consectetur ad ut do nostrud laboris esse voluptate sunt amet.",email:"example@email.com"}];function E(){return e(d,{children:m==null?void 0:m.map(i=>{var s;return t(w,{sx:L,children:[t("div",{className:"items-center sm:flex",children:[t("span",{className:"inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-blue-400 rounded-full",children:["#",i.id]}),e("p",{className:"mt-3 text-lg font-medium sm:mt-0 sm:ml-3",children:i.title})]}),e("p",{className:"mt-4 text-gray-500",children:i.description}),t("span",{className:"inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800",children:[i.category," "]}),e("span",{className:"inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800",children:(s=i.tags)==null?void 0:s.map((a,c)=>t("span",{children:[a," / "]},c))}),e("div",{className:"mt-4",children:e("span",{className:"inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800",children:y(i.date).format("Do MMM YYYY")})}),t("div",{className:"mt-4",children:[e("span",{className:"inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800",children:`Contact: ${i.pm}`}),e("span",{className:"inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800",children:i.email}),e("span",{className:"inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800",children:i.number})]}),e("div",{className:"mt-6 sm:flex",children:e("a",{className:"inline-block w-full h-12 px-5 py-3 mt-3 text-sm font-semibold text-center text-gray-500 rounded-lg hover:bg-blue918 hover:text-white bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto",href:"",children:"Submit Review"})})]},i==null?void 0:i.id)})})}function I(){const i=j(),s=h(f),[a,{isLoading:c,isError:z,data:l,error:_}]=v(),[u,{isLoading:T,data:x}]=q();return p.useEffect(()=>{a(s==null?void 0:s.id),u(s==null?void 0:s.id)},[]),console.log("PersonalDetails",l),console.log("assignmentData",x),t(d,{children:[e("div",{className:" ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200",children:e("div",{className:"w-full px-6 py-6 mx-auto text-slate-500",children:t("div",{className:"relative flex flex-col flex-auto min-w-0 p-4 mb-4 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border",children:[e("span",{className:"absolute inset-x-0 bottom-0 w-full h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"}),t("div",{className:"flex flex-col items-center justify-center md:flex-row",children:[t("div",{className:"w-full p-3 mx-10 mt-6 ",children:[t("h3",{className:"text-xl font-bold text-gray-900",children:["USER ID : ",s==null?void 0:s.id," "]}),e("div",{className:"flex flex-col w-full mt-2 md:flex-row",children:t("div",{className:"flex w-full flex-col justify-between p-8 transition-shadow bg-white shadow-xl group rounded-xl hover:shadow-lg",children:[t("h3",{className:"flex items-center mb-2 text-4xl font-semibold leading-normal text-blueGray-700",children:[e("span",{className:"capitalize",children:l==null?void 0:l.firstname})," ",e("span",{className:"pl-2 capitalize",children:l==null?void 0:l.lastname})," ",e(r,{size:20,className:"mx-1"})]}),t("div",{className:"flex items-center mt-0 mb-2 text-sm font-bold leading-normal uppercase",children:[e(g,{size:20,className:"mx-1"}),l==null?void 0:l.address,e(r,{size:20,className:"mx-1"})]}),t("div",{className:"flex items-center mt-10 mb-2 text-blueGray-600",children:[e(b,{size:20,className:"mx-1"}),l==null?void 0:l.email]}),t("div",{className:"flex items-center mb-2 text-blueGray-600",children:[e(N,{size:20,className:"mx-1"}),"+91 ",l==null?void 0:l.number,e(r,{size:20,className:"mx-1"})]})]})})]}),e("div",{className:"w-full p-3 mx-auto mt-6 ",children:t("div",{className:"flex flex-wrap -mx-3 gap-10",children:[e("div",{className:"z-10 w-full max-w-full mb-4 shadow-2xl rounded-xl lg-max:mt-6 xl:w-4/12",children:t("div",{className:"relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border",children:[t("div",{className:"p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl",children:[e("div",{className:"flex flex-wrap -mx-3",children:e("div",{className:"flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none",children:e("h6",{className:"mb-0",children:"Wallet Stats"})})}),e("hr",{className:"h-px my-4 bg-transparent bg-gradient-horizontal-light"})]}),e("div",{className:"flex flex-col items-center justify-center ",children:t("ul",{className:"flex flex-col pl-0 mb-0 rounded-lg",children:[t("li",{className:"flex items-center justify-start max-w-[20rem] px-4 py-6 pt-0 pl-0  bg-white  ",children:[t("strong",{className:"text-blue918 flex items-center justify-start",children:[e("span",{children:"Wallet Coins "}),e(n,{size:20,className:"mx-1"})]}),e("p",{className:"text-sm text-center text-gray-500",children:l==null?void 0:l.wallet_coins})]}),e("li",{className:"flex items-center justify-start max-w-[20rem] px-4 py-6 pt-0 pl-0  bg-white  ",children:e("strong",{className:"text-blue918 flex items-center justify-start",children:e("button",{onClick:()=>{i("/client/wallet")},className:"bg-blue918 text-white p-2 rounded-lg flex items-center justify-start",children:t("span",{className:"flex items-center justify-start",children:[e("span",{children:"Add Balance "}),e(A,{size:20,className:"mx-2"})]})})})})]})})]})}),e("div",{className:"z-10 w-full max-w-full mb-4 shadow-2xl rounded-xl lg-max:mt-6 xl:w-4/12",children:t("div",{className:"relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border",children:[t("div",{className:"p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl",children:[t("div",{className:"flex flex-wrap -mx-3",children:[e("div",{className:"flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none",children:e("h6",{className:"mb-0",children:"Assignment Stats"})}),t("div",{className:"flex items-center justify-start text-left px-3",children:[e("span",{className:"text-sm text-gray-500",children:"Total Assignments"}),e("span",{className:"text-sm text-blue918",children:l==null?void 0:l.total_assignments_count})]})]}),e("hr",{className:"h-px my-4 bg-transparent bg-gradient-horizontal-light"})]}),e("div",{className:"flex flex-col items-center justify-start text-left ",children:t("ul",{className:"flex flex-col pl-0 mb-0 rounded-lg justify-start text-left",children:[t("li",{className:"flex items-center justify-start max-w-[20rem] px-4 py-6 pt-0 pl-0  bg-white  ",children:[t("strong",{className:"text-blue918 text-left flex items-center justify-start",children:[e("span",{children:"Freelancing "}),e(n,{size:20,className:"mx-1"})]}),e("p",{className:"text-sm text-left text-gray-500",children:l==null?void 0:l.total_freelancing_assignments_count})]}),t("li",{className:"flex items-center justify-start max-w-[20rem] px-4 py-6 pt-0 pl-0  bg-white  ",children:[t("strong",{className:"text-blue918 flex items-center justify-start",children:[e("span",{children:"Art "}),e(n,{size:20,className:"mx-1"})]}),e("p",{className:"text-sm text-center text-gray-500",children:l==null?void 0:l.total_art_assignments_count})]}),t("li",{className:"flex items-center justify-start max-w-[20rem] px-4 py-6 pt-0 pl-0  bg-white  ",children:[t("strong",{className:"text-blue918 flex items-center justify-start",children:[e("span",{children:"ED "}),e(n,{size:20,className:"mx-1"})]}),e("p",{className:"text-sm text-center text-gray-500",children:l==null?void 0:l.total_ed_assignments_count})]}),t("li",{className:"flex items-center justify-start max-w-[20rem] px-4 py-6 pt-0 pl-0  bg-white  ",children:[t("strong",{className:"text-blue918 flex items-center justify-start",children:[e("span",{children:"Typing"}),e(n,{size:20,className:"mx-1"})]}),e("p",{className:"text-sm text-center text-gray-500",children:l==null?void 0:l.total_typing_assignments_count})]}),t("li",{className:"flex items-center justify-start max-w-[20rem] px-4 py-6 pt-0 pl-0  bg-white  ",children:[t("strong",{className:"text-blue918 flex items-center justify-start",children:[e("span",{children:"Writing"}),e(n,{size:20,className:"mx-1"})]}),e("p",{className:"text-sm text-center text-gray-500",children:l==null?void 0:l.total_writing_assignments_count})]})]})})]})})]})})]})]})})}),e(E,{})]})}export{I as default};
