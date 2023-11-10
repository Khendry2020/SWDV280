<div class="container row p-3 color-orange color-light rounded mr-5 ">
    <h1>Donation form download.</h1>
    <p>Download and fillout our form and bring it with you, when you bring your donations or email it to us at  
        <a href="mailto:ScottsFurnitureBarn@gmail.com" class="text-decoration-none">
                <i class="bi bi-envelope-at ">&nbsp;ScottsFurnitureBarn@gmail.com</i>
        </a>
    </p>
    <ul class="download">
        
        <h2>Donation Drop-off hours:</h2>
        <li>Monday: 1-5pm</li>
        <li>Tuesday: 1-5pm</li>
        <li>Wednesday: 1-5pm</li>
        <li>Turesday: 1-5pm</li>
        <li>Friday: 1-5pm</li>
        <li>Saturday: 2-5pm</li>
        <button>
            <a class="button text-decoration-none text-black" href="DonationForm.docx" Download ="ScottsDonationform">Download Donation Form</a>
        </button>
    </ul>
      
    


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