import { $, $$ } from "../configs/constants.js";
import { baseUrl} from "../configs/configs.js";
let dataRes = {};
async function getData(){
    await new Promise((resolve, rejext)=>{
        let id = 2;
        fetch(`${baseUrl}controller/students.php?id=${id}`,{
            method:"GET",
            credentials:"include"
        }).then(res=>{
            res.text().then(res=>{
                dataRes = JSON.parse(res);
                resolve()
            })
        }).catch(e=>rejext(e))
    })
}
function showStudent(){
    $("#name").value = dataRes.name;
    $("#age").value = dataRes.age;
    dataRes.sex==1 ? $("#nam").checked=true:$("#nu").checked=true
    $("#address").value = dataRes.address;
    $("#class").value = dataRes.class;
}
function handleChange(){
    $("#btn-change").addEventListener('click',function(event){
        event.preventDefault();
        let isValidate = true;
    let name = $("#name").value;
    let age = $("#age").value;
    let address = $("#address").value;
    let classInput = $("#class").value;
    if(name.trim().length===0||name.trim().length>30){
        isValidate=false;
        alert("Ten 0->30 ky tu")
    }
    if(address.trim().length===0||address.trim().length>255){
        isValidate=false;
        alert("Dia chi 0->255 ky tu")
    }
    if(classInput.trim().length===0||classInput.trim().length>255){
        isValidate=false;
        alert("Lop 0->255 ky tu")
    }
    if(Number(age.trim())<=0||Number(age.trim())<=17){
        isValidate=false;
        alert("Tuổi lớn hơn 18")
    }

    if(isValidate){
        let form = $("#form-change");
        let formData  = new FormData(form);
        fetch(`${baseUrl}controller/students.php?id=${dataRes.id}`,{
            method:"POST",
            body: formData,
            credentials: "include"
        }).then(res=>{res.text().then(res=>{
                    alert(res)
                })
            if(res.status===200||res.status===201){
                alert("Sửa thanh cong!");
            }else{
                
            }
        })
    }
    })
}
async function mainFn(){
    try{
        await getData();
        showStudent();
        handleChange();
    }catch(e){
    }
}
mainFn()
