<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">

    <title>Notes+</title>
    

    <style>
    .form {
        border: 2px solid #343a40;
        padding: 1rem;
        border-radius: 8px;
    }
    body{
        background: rgb(17,15,14);
        background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);
    }
    </style>

</head>

<body>

    <?php 
    include"./NavBar.php"; 
    require"./db.php";
    include"./edit.php"; 

    if(isset($_POST['submit']))
    {
        if(!isset($_POST["hidden"])){
        // Data
        $title = $_POST['title'];
        $description = $_POST['description'];

        //Inserting data
        $sql="INSERT INTO `notes`( `title`, `description`) VALUES ( '$title', '$description' )";

        $res=mysqli_query($con,$sql);

        //testing
        /*if ($res) 
        {
         header("location: index.php?msg=new record created successfully");
        } 
        else
        {
         echo "Error" . mysqli_error($con);
        }*/
    }
 
    }
    ?>
    <div class="container my-4 ">
        <div class="row justify-content-center">
            <div class="col-lg-10 ">
                <form class="form bg-dark bg-gradient shadow-lg text-light" action="" method="post">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Enter Description..."
                            name="description"></textarea>
                    </div>
                  <button type="submit" class="btn btn-primary" name="submit">Add Note</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1 class="text-light"> Your Notes </h1>

                <?php
                include"./db.php";

                $sql="SELECT * FROM `notes`";
                $res=mysqli_query($con,$sql);
                $noNotes=true;
                while ($fetch=mysqli_fetch_assoc($res))
                {
                    $noNotes=false;
                    echo ' <div class="card my-4 bg-dark bg-gradient shadow-lg text-light">
                    <div class="card-body">
                    <h5 class="card-title">'.$fetch["title"].'</h5>
                    <p class="card-text">'.$fetch["description"].'</p>
                    <button type="button" class="btn btn-success edit" data-bs-toggle="modal" data-bs-target="#exampleModal" id="'.$fetch["sno"].'" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg></button>
                    <a href="./delete.php?id='.$fetch["sno"].'" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg></a>
                    </div>
                    </div> ';
                }
                if($noNotes)
                {
                    echo 
                    '
                    <div class="card my-4 bg-dark bg-gradient shadow-lg text-light">
                    <div class="card-body">
                    <h5 class="card-title">Massage:</h5>
                    <p class="card-text">No Notes are Available Right Now.</p>
                    </div>
                    </div>
                    ';
                }

        ?>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
    const edit = document.querySelectorAll(".edit");
    const editTitle = document.getElementById("edittitle");
    const editDescription = document.getElementById("editdescription");
    const hiddenInput = document.getElementById("hidden");
    const cardBody=document.querySelectorAll(".card-body");
    edit.forEach(element => {
        element.addEventListener("click", () => {
            const titleText = element.parentElement.children[0].innerText;
            const descText = element.parentElement.children[1].innerText;
            editTitle.value = titleText;
            editDescription.value = descText;
            hiddenInput.value = element.id;
            console.log(hidddenInput);
        });
    });
    const search=document.getElementById('search');
    search.addEventListener("input", () => {
        const value=search.value.toLowerCase();
        cardBody.forEach(element => {
            const titleText = element.children[0].innerText.toLowerCase();
            const descText = element.children[1].innerText.toLowerCase();
            if(titleText.includes(value) || descText.includes(value) )
            {
                element.parentElement.style.display="block";
            }
            else
            {
                element.parentElement.style.display="none";
            }
        });
    })
    </script>
  
</body>
</html>