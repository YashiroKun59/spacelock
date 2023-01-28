let selectSite=document.getElementById('siteSelect');
let buttonSite=document.getElementById('siteButton');
if(selectSite && buttonSite){
    selectSite.addEventListener('change', e => {
        buttonSite.href = "/catalog/" + selectSite.value;
    });
}
