<template>
    <div>
        <div class="main">
            <div class="maincircle">
                <div class="circle2"></div>
            </div>
            <div class="text"><h6 class="text2">octarine</h6></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "splashscreen",
    data() {
        return {}
    },
    methods: {
        flagscreen: function () {
            this.$store.dispatch('ActionFlagScreen', 'shown');
        },
    },
    mounted() {
        setTimeout(function () {
            document.getElementsByClassName('circle2')[0].style.opacity = '0';
            document.getElementsByClassName('maincircle')[0].style.overflow = 'visible';
        }, 1000)
        setTimeout(function () {

            document.getElementsByClassName('maincircle')[0].style.width = '23em';
            document.getElementsByClassName('maincircle')[0].style.height = '23em';
            document.getElementsByClassName('maincircle')[0].style.top = '7.5em';
            document.getElementsByClassName('maincircle')[0].style.left = '25em';

            document.getElementsByClassName('text')[0].style.width = '23em';
            document.getElementsByClassName('text')[0].style.height = '23em';
            document.getElementsByClassName('text')[0].style.top = '7em';
            document.getElementsByClassName('text')[0].style.left = '25em';
            document.getElementsByClassName('text2')[0].style.fontSize = '8em';
            document.getElementsByClassName('text2')[0].style.textShadow = ' 0 0 1em #FFD700,0 0 2em #FFD700,0 0 3em #FFD700';
            document.getElementsByClassName('text2')[0].style.color = '#FFD700';
        }, 11000)
         setTimeout(this.flagscreen, 16000);
    },
    computed :{

    }
}

// window.location.href = 'index2';
// this.$router.push({ name: 'main' });

</script>

<style scoped>
.main{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 35em;
    background-image:url("/storage/newimage/cosmos.jpg");
}
.maincircle{
    position:absolute;
    left: 27em;
    top: 11em;
    opacity: 1;
    background-color: #F5F5F5;
    width: 13em;
    height: 13em;
    border-radius: 50%;
    transition: 3s;
    box-shadow: 0 0 1em white,0 0 2em white,0 0 8em white,0 0 8em white;


}
.circle1,.circle2{
    left: 0;
    top: 0;
    width: 13em;
    height: 13em;
    position: absolute;

}
/*.circle1{*/
/*    background-color:white;*/
/*    transition: 3s;*/
/*    border-radius: 50%;*/

/*    box-shadow: 0 0 1em white,0 0 2em white,0 0 8em white,0 0 8em white;*/
/*}*/
.circle2{
    background-color:black;
    transition: 10s;
    border-radius: 50%;
    opacity: 1;
}
.text{
    position: absolute;
    left: 27.5em;
    top: 11em;
    transition: 3s;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 13em;
    height: 13em;
    letter-spacing: 1em;
}
.text2{
    font-family: BlinkMacSystemFont;
    color: black;
    font-size: 3em;
    transition: 3s;
}

</style>
