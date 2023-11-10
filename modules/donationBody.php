<style>
    .download > li{
text-decoration: none;
/* <a href="https://www.flaticon.com/free-icons/farm" title="farm icons">Farm icons created by smashingstocks - Flaticon</a> */
list-style-image:url('barn.png');
}
</style>
<h1 class="text-center">Donation form download.</h1>
<div id="download"  class="container color-orange color-light rounded mt-4 download">
   
    <p class="text-center">Download and fillout our form and bring it with you, when you bring your donations or email it to us at  
        <a href="mailto:ScottsFurnitureBarn@gmail.com" class="text-decoration-none color-info">
                <i class="bi bi-envelope-at ">&nbsp;ScottsFurnitureBarn@gmail.com</i>
        </a>
    </p>
    <ul class="download" >
        <h2>Donation Drop-off hours:</h2>
        <li>Monday: 1-5pm</li>
        <li>Tuesday: 1-5pm</li>
        <li>Wednesday: 1-5pm</li>
        <li>Turesday: 1-5pm</li>
        <li>Friday: 1-5pm</li>
        <li>Saturday: 2-5pm</li>
        <button class="mt-3 mb-3 rounded">
            <a class="button text-decoration-none text-black" href="DonationForm.docx" Download ="ScottsDonationform">Download Donation Form</a>
        </button>
    </ul>
</div>     
    


     <script>
        download = document.querySelectorAll("[data-Download]")

        download.foreach(button =>{
            const id = button.dataset.download;
            const image = document.getElementById(id);
            const a = document,createElement("a");

            a.href = image.src;
            a.download = "";
            a.style.display = "none";

            button.addEventListener("click", () => {
                document.div.apendChild(a);
                a.click();
                a.div.removeChild(a);
            });
        });
     </script>