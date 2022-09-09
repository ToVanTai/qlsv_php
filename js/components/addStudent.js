import {$, $$} from "../../js/configs/constants.js"
import {baseUrl} from "../../js/configs/configs.js"

let btnAdd = $("#btn-add")
btnAdd.addEventListener('click',handleAdd)
function handleAdd(e){
    e.preventDefault();
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
        let form = $("#form-add");
        let formData  = new FormData(form);
        fetch(`${baseUrl}controller/students.php`,{
            method:"POST",
            body: formData,
            credentials: "include"
        }).then(res=>{
            if(res.status===200||res.status===201){
                alert("Them thanh cong!");
            }else{
                res.text().then(res=>{
                    alert(res)
                })
            }
        })
    }
}