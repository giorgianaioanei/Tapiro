/*$('.alien').delay(500).animate({top: '60%'}, 1500);
$('.alien').delay(1500).animate({top: '0'}, 1000);*/
//$('.alien').delay(500).animate({top: '60%'}, 1500);
gsap.to("#alien", {top: '80vh', duration: '0.5', ease: 'cubic-bezier(0.215,0.610,0.355,1)'});
gsap.to("#alien", {delay: '1.5', top: '0vh', duration: '1.5', ease: 'cubic-bezier(0.215,0.610,0.355,1)', width: '10%'});