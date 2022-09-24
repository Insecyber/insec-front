const deviceType = () => {
    const ua = navigator.userAgent;
    if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
        // return "tablet";
        console.log("tablet");
        // window.location.href('https://www.insecyber.com/mobile');
    }
    else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua)) {
        // return "mobile";
        console.log("mobile");
    }
    // return "desktop";
    else{
        console.log("desktop");
    }
    
};

$(function() {
    deviceType();
});