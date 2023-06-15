(()=>{var r,e={80:()=>{
/**
 * Primary front-end script.
 *
 * Primary JavaScript file. Any includes or anything imported should be filtered through this file
 * and eventually saved back into the `/assets/js/app.js` file.
 *
 * @package   Initiator
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2019-2020 Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/benlumia007/initiator
 */
var r,e,o,i;(r=jQuery)(window).scroll((function(){r(this).scrollTop()>=e?(o="down")!==i&&(r(".menu-toggle").addClass("hide"),i=o):(o="up")!==i&&(r(".menu-toggle").removeClass("hide"),i=o),e=r(this).scrollTop()}))},779:()=>{}},o={};function i(r){var n=o[r];if(void 0!==n)return n.exports;var t=o[r]={exports:{}};return e[r](t,t.exports,i),t.exports}i.m=e,r=[],i.O=(e,o,n,t)=>{if(!o){var l=1/0;for(p=0;p<r.length;p++){for(var[o,n,t]=r[p],s=!0,a=0;a<o.length;a++)(!1&t||l>=t)&&Object.keys(i.O).every((r=>i.O[r](o[a])))?o.splice(a--,1):(s=!1,t<l&&(l=t));if(s){r.splice(p--,1);var v=n();void 0!==v&&(e=v)}}return e}t=t||0;for(var p=r.length;p>0&&r[p-1][2]>t;p--)r[p]=r[p-1];r[p]=[o,n,t]},i.o=(r,e)=>Object.prototype.hasOwnProperty.call(r,e),(()=>{var r={773:0,222:0};i.O.j=e=>0===r[e];var e=(e,o)=>{var n,t,[l,s,a]=o,v=0;if(l.some((e=>0!==r[e]))){for(n in s)i.o(s,n)&&(i.m[n]=s[n]);if(a)var p=a(i)}for(e&&e(o);v<l.length;v++)t=l[v],i.o(r,t)&&r[t]&&r[t][0](),r[t]=0;return i.O(p)},o=self.webpackChunkprismatic=self.webpackChunkprismatic||[];o.forEach(e.bind(null,0)),o.push=e.bind(null,o.push.bind(o))})(),i.O(void 0,[222],(()=>i(80)));var n=i.O(void 0,[222],(()=>i(779)));n=i.O(n)})();