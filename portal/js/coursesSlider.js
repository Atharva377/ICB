// Learn New skill section Slider
class Slider{
    constructor(prev, next, display, slider, card, slide_time, state=false){
        this.new_skill_prev = document.getElementById(prev); // previous button element
        this.new_skill_next = document.getElementById(next); // Next button element
        this.course_display = document.getElementById(display); // Display bar
        this.course_slider = document.getElementById(slider); // Element slider
        this.course_card = document.getElementsByClassName(card)[0]; // card element
        this.slide_time = slide_time;
        this.state = state;
    }

    slider_start() {
        if(window.innerWidth>540 || this.state){
            // Button click to change the slider 
            // Next
            
            this.new_skill_next.addEventListener('click', () =>{
                const display_width = this.course_display.clientWidth;
                // console.log(course_slider.scrollLeft+display_width);
                // console.log(display_width);
                // const width_course_card = course_card.clientWidth;
                // console.log(width_course_card);
                // console.log(course_display.scrollWidth);
                // console.log(course_display.scrollLeft);
                // console.log(course_display.scrollWidth-display_width);
                if(this.course_display.scrollLeft>this.course_display.scrollWidth-display_width-100){
                    this.course_display.scrollLeft-=this.course_display.scrollWidth;
                    // console.log("Event scroll limit max reached");
                }else{
                    this.course_display.scrollLeft+=display_width; 
                }
            })
            
            // Previous
            this.new_skill_prev.addEventListener('click', () =>{
                const display_width = this.course_display.clientWidth;
                // console.log(display_width);
                // console.log();
                if(this.course_display.scrollLeft<=0){
                    this.course_display.scrollLeft = this.course_display.scrollWidth;
                }else{
                    this.course_display.scrollLeft-=display_width; 
                }
            })
            
            // Automating the swiper
            setInterval(()=>{
                const display_width = this.course_display.clientWidth;
                // console.log(course_slider.scrollLeft+display_width);
                // console.log(display_width);
                // const width_course_card = course_card.clientWidth;
                // console.log(width_course_card);
                // console.log(course_display.scrollWidth);
                // console.log(course_display.scrollLeft);
                // console.log(course_display.scrollWidth-display_width);
                if(this.course_display.scrollLeft>this.course_display.scrollWidth-display_width-100){
                    this.course_display.scrollLeft-=this.course_display.scrollWidth;
                    // console.log("Event scroll limit max reached");
                }else{
                    this.course_display.scrollLeft+=display_width; 
                }
            }, this.slide_time);
            
            // course_display.addEventListener('swiped-right', () => {
                //     console.log("swipped right");
                // })
        }
        else{
            this.new_skill_next.addEventListener('click', () =>{
                console.log(this.course_card);
                console.log(this.course_card.clientWidth);
                const display_width = this.course_card.clientWidth;
                // console.log(course_slider.scrollLeft+display_width);
                // console.log(display_width);
                // const width_course_card = course_card.clientWidth;
                // console.log(width_course_card);
                // console.log(course_display.scrollWidth);
                // console.log(course_display.scrollLeft);
                // console.log(course_display.scrollWidth-display_width);
                if(this.course_display.scrollLeft>this.course_display.scrollWidth-display_width-100){
                    this.course_display.scrollLeft-=this.course_display.scrollWidth;
                    // console.log("Event scroll limit max reached");
                }else{
                    this.course_display.scrollLeft+=display_width; 
                }
            })
            
            // Previous
            this.new_skill_prev.addEventListener('click', () =>{
                const display_width = this.course_card.clientWidth;
                // console.log(display_width);
                // console.log();
                if(this.course_display.scrollLeft<=0){
                    this.course_display.scrollLeft = this.course_display.scrollWidth;
                }else{
                    this.course_display.scrollLeft-=display_width; 
                }
            })
            
            // Automating the swiper
            // let current = 1;
            this.course_display.scrollLeft = 15;
            setInterval(()=>{
                const display_width = this.course_card.clientWidth;
                // const course_slider = document.getElementById("learn_new_skills_slider");
                // console.log(course_slider.clientWidth);
                // console.log(course_slider.clientWidth/Array.from(course_slider.children).length);
                // console.log(Array.from(course_slider.children).length);
                // current++;
                // course_slider[current]
                // console.log(course_slider.scrollLeft+display_width);
                // console.log(display_width);
                // const width_course_card = coursse_card.clientWidth;
                // console.log(width_course_card);
                // console.log(course_display.scrollWidth);
                // console.log(course_display.scrollLeft);
                // console.log(course_display.scrollWidth-display_width);
                if(this.course_display.scrollLeft>this.course_display.scrollWidth-display_width-100){
                    // current++;
                    // console.log(course_card.style.marginLeft);
                    // console.log(Math.ceil(course_slider.clientWidth/Array.from(course_slider.children).length)*Array.from(course_slider.children).length);
                    // course_display.scrollLeft-=Math.ceil(course_slider.clientWidth/Array.from(course_slider.children).length)*Array.from(course_slider.children).length; //course_display.scrollWidth;
                    this.course_display.scrollLeft=15; //course_display.scrollWidth;
                    // console.log("Event scroll limit max reached");
                }else{
                    this.course_display.scrollLeft+=Math.ceil(this.course_slider.clientWidth/Array.from(this.course_slider.children).length); 
                }
            }, this.slide_time);
            
            // Touch Functionality: Under development
            // course_slider.addEventListener('touchstart',() => {
                
                // },false)
        }
    }
            
}
// import {Slider} from "./course_slider.mjs";
        // console.log("Slider stared");
const new_skills = new Slider("learn_new_skills_prev","learn_new_skills_next", "learn_new_skills_display", "learn_new_skills_slider",  "learn_new_skills_card",  5000);
new_skills.slider_start();

const skill_backpack = new Slider("my_skill_backpack_prev","learn_new_skills_next", "my_skill_backpack_display", "my_skill_backpack_slider",  "my_skill_backpack_card", 4000);
skill_backpack.slider_start();


const courses_banner = new Slider("course_banner__top__btn_prev","course_banner__top__btn_next", "course_banner__top__display", "course_banner__top__images",  "course_banner__top__course_image", 3000, true);
courses_banner.slider_start();

// const new_skill_prev = document.getElementById("learn_new_skills_prev");
// const new_skill_next = document.getElementById("learn_new_skills_next");

// const course_display = document.getElementById("learn_new_skills_display");
// const course_slider = document.getElementById("learn_new_skills_slider");

// const course_card = document.getElementsByClassName("course_card")[0];

// if(window.innerWidth>540){
// // Button click to change the slider 
// // Next
// new_skill_next.addEventListener('click', () =>{
//     const display_width = course_display.clientWidth;
//     // console.log(course_slider.scrollLeft+display_width);
//     // console.log(display_width);
//     // const width_course_card = course_card.clientWidth;
//     // console.log(width_course_card);
//     // console.log(course_display.scrollWidth);
//     // console.log(course_display.scrollLeft);
//     // console.log(course_display.scrollWidth-display_width);
//     if(course_display.scrollLeft>course_display.scrollWidth-display_width-100){
//         course_display.scrollLeft-=course_display.scrollWidth;
//         // console.log("Event scroll limit max reached");
//     }else{
//         course_display.scrollLeft+=display_width; 
//     }
// })

// // Previous
// new_skill_prev.addEventListener('click', () =>{
//     const display_width = course_display.clientWidth;
//     // console.log(display_width);
//     // console.log();
//     if(course_display.scrollLeft<=0){
//         course_display.scrollLeft = course_display.scrollWidth;
//     }else{
//     course_display.scrollLeft-=display_width; 
//     }
// })

// // Automating the swiper
// setInterval(()=>{
//     const display_width = course_display.clientWidth;
//     // console.log(course_slider.scrollLeft+display_width);
//     // console.log(display_width);
//     // const width_course_card = course_card.clientWidth;
//     // console.log(width_course_card);
//     // console.log(course_display.scrollWidth);
//     // console.log(course_display.scrollLeft);
//     // console.log(course_display.scrollWidth-display_width);
//     if(course_display.scrollLeft>course_display.scrollWidth-display_width-100){
//         course_display.scrollLeft-=course_display.scrollWidth;
//         // console.log("Event scroll limit max reached");
//     }else{
//         course_display.scrollLeft+=display_width; 
//     }
// }, 5000);

// // course_display.addEventListener('swiped-right', () => {
// //     console.log("swipped right");
// // })
// }
// else{
//     new_skill_next.addEventListener('click', () =>{
//         const display_width = course_card.clientWidth;
//         // console.log(course_slider.scrollLeft+display_width);
//         // console.log(display_width);
//         // const width_course_card = course_card.clientWidth;
//         // console.log(width_course_card);
//         // console.log(course_display.scrollWidth);
//         // console.log(course_display.scrollLeft);
//         // console.log(course_display.scrollWidth-display_width);
//         if(course_display.scrollLeft>course_display.scrollWidth-display_width-100){
//             course_display.scrollLeft-=course_display.scrollWidth;
//             // console.log("Event scroll limit max reached");
//         }else{
//             course_display.scrollLeft+=display_width; 
//         }
//     })
    
//     // Previous
//     new_skill_prev.addEventListener('click', () =>{
//         const display_width = course_card.clientWidth;
//         // console.log(display_width);
//         // console.log();
//         if(course_display.scrollLeft<=0){
//             course_display.scrollLeft = course_display.scrollWidth;
//         }else{
//         course_display.scrollLeft-=display_width; 
//         }
//     })
    
//     // Automating the swiper
//     // let current = 1;
//     course_display.scrollLeft = 15;
//     setInterval(()=>{
//         const display_width = course_card.clientWidth;
//         const course_slider = document.getElementById("learn_new_skills_slider");
//         // console.log(course_slider.clientWidth);
//         // console.log(course_slider.clientWidth/Array.from(course_slider.children).length);
//         // console.log(Array.from(course_slider.children).length);
//         // current++;
//         // course_slider[current]
//         // console.log(course_slider.scrollLeft+display_width);
//         // console.log(display_width);
//         // const width_course_card = coursse_card.clientWidth;
//         // console.log(width_course_card);
//         // console.log(course_display.scrollWidth);
//         // console.log(course_display.scrollLeft);
//         // console.log(course_display.scrollWidth-display_width);
//         if(course_display.scrollLeft>course_display.scrollWidth-display_width-100){
//             // current++;
//             console.log(course_card.style.marginLeft);
//             // console.log(Math.ceil(course_slider.clientWidth/Array.from(course_slider.children).length)*Array.from(course_slider.children).length);
//             // course_display.scrollLeft-=Math.ceil(course_slider.clientWidth/Array.from(course_slider.children).length)*Array.from(course_slider.children).length; //course_display.scrollWidth;
//             course_display.scrollLeft=15; //course_display.scrollWidth;
//             // console.log("Event scroll limit max reached");
//         }else{
//             course_display.scrollLeft+=Math.ceil(course_slider.clientWidth/Array.from(course_slider.children).length); 
//         }
//     }, 5000);

//     // Touch Functionality
//     course_slider.addEventListener('touchstart',() => {
        
//     },false)
// }