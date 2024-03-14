export default class Slider{
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

// export default Slider;