(function(){var b=document.querySelector('.menu-btn');
if(b){b.addEventListener('click',function(){var o=document.body.classList.toggle('nav-open');b.setAttribute('aria-expanded',o?'true':'false');});}
document.querySelectorAll('.sub-btn').forEach(function(s){s.addEventListener('click',function(){var p=s.parentNode,o=p.classList.toggle('open');s.setAttribute('aria-expanded',o?'true':'false');});});
document.querySelectorAll('.nav a').forEach(function(a){a.addEventListener('click',function(){document.body.classList.remove('nav-open');});});})();
