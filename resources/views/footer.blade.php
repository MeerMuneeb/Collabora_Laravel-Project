<style>
footer {
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #d8d8d8;
} 
@import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap');


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Nunito', sans-serif;
    text-decoration: none;
}


footer{
    width: 100%;
    padding: 0px 0px;
    padding-bottom: 20px;
}

.container__footer{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    max-width: 1600px;
    margin: auto;
}

.box__footer{
    display: flex;
    flex-direction: column;
    padding: 40px;
}

.box__footer .logo img{
    width: 180px;
}

.box__footer .terms{
    max-width: 350px;
    margin-top: 20px;
    font-weight: 500;
    color: #7a7a7a;
    font-size: 18px;
}

.box__footer h2{
    margin-bottom: 30px;
    color: #343434;
    font-weight: 700;
    font-size: 28px;
}

.box__footer a{
    margin-top: 10px;
    color: #7a7a7a;
    font-weight: 600;
}

.box__footer a:hover{
    opacity: 0.8;
}

.box__footer a .fab{
    font-size: 20px;
}

.box__copyright{
    max-width: 1200px;
    margin: auto;
    text-align: center;
    padding: 0px 40px;
}

.box__copyright p{
    margin-top: 20px;
    color: #7a7a7a;
}

.box__copyright hr{
    border: none;
    height: 1px;
    background-color: #7a7a7a;
}
</style>
<!-- <div style="clear:both" class="footer">
    <div class="panel-footer">Copyright © 2023, Muneeb Khan SP21-BCS-043, All Rights Reserved.</div>
</div> -->

<footer>

    <div class="container__footer">
        <div class="box__footer">
            <div class="logo">
              <h1 style="font-family: 'Berkshire Swash'; font-size: 40px;">collabora.</h1>
            </div>
            <div class="terms">
                <p>Unlock your potential with our affordable training services. Become a pro in various categories through our high-quality courses and gain valuable skills for personal and professional growth. Start your learning journey today!</p>
            </div>
        </div>

        <div class="box__footer">
            <h2>Popular Categories</h2>
            <a href="/Cexplore/8">Graphic Designing</a>
            <a href="/Cexplore/9">Video Editing</a>
            <a href="/Cexplore/10">Business Education</a>
            <a href="/Cexplore/11">Photography</a>
            <a href="/Cexplore/12">Martial Arts</a>
        </div>

        <div class="box__footer">
            <h2>Popular Services</h2>
            <a href="/detail/11">Logo Designing</a>
            <a href="/detail/15">Reel Making</a>
            <a href="/detail/14">Entrepreneurship Course</a>
            <a href="/detail/12">Boxing in 60 Days</a>
            <a href="/detail/13">Wildlife Photography</a>              
        </div>

        <div class="box__footer">
            <h2>Social Links</h2>
            <a href="https://www.facebook.com"><i class="fab fa-facebook-square"></i> Facebook</a>
            <a href="https://www.twitter.com"><i class="fab fa-twitter-square"></i> Twitter</a>
            <a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i> Linkedin</a>
            <a href="https://www.instagram.com"><i class="fab fa-instagram-square"></i> Instagram</a>
        </div>
          

    </div>

    <div class="box__copyright">
        <hr>
        <p>Copyright © 2023, <b>Muneeb Khan SP21-BCS-043</b>, All Rights Reserved.</p>
    </div>
</footer>