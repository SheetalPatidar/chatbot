<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>


</head>

<body>


    <br>
    <br>
    <div class="cont">
        <div class="form sign-in">

            <h2>Query</h2>
            <form action="query.php" method="POST">

                <div class="inputBox1" style="margin-top:60px;">
                    <input type="text" name="userMsg" required="required">
                    <span>Query</span>
                </div>

                <button type="submit" class="btn btn-dark submit">Search</button>
            </form>
        </div>

        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">

                    <h3>I'm here to assist you. Feel free to ask any questions.<h3>
                </div>
                <div class="img__text m--in">

                    <h3>Hello, how can I help you?<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">FAQ</span>
                    <span class="m--in">Query</span>
                </div>
            </div>

            <div class="form sign-up">
                <h2>Frequently Asked Question</h2>
                <!-- dropdown start -->
                <select id="faq-dropdown" class="form-control dept" name="faq" required>
                    <option value="">Select</option>
                    <?php
                    include("db.php");

                    // Fetch questions, id , answer from the faq table
                    $query = "SELECT id, question, ans FROM faq";
                    $stmt = $db->query($query);
                    $faqData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Generate the dropdown options
                    foreach ($faqData as $row) {
                        $question = $row['question'];
                        $answer = $row['ans'];
                        echo '<option value="' . $row['id'] . '" data-answer="' . $answer . '">' . $question . '</option>';
                    }
                    ?>
                </select>

                <div id="answer-container"></div>

                <script>
                    // Handle dropdown change event
                    document.getElementById("faq-dropdown").addEventListener("change", function() {
                        var selectedOption = this.options[this.selectedIndex];
                        var answer = selectedOption.getAttribute("data-answer");

                        // Update the answer container
                        document.getElementById("answer-container").innerText = answer;
                        document.getElementById("answer-container").style.padding = "10px"; // Add padding
                        document.getElementById("answer-container").style.fontWeight = "bold"; // Make font bold
                        document.getElementById("answer-container").style.fontSize = "20px"; // Make font bigger
                    });
                </script>




                <!-- dropdown end -->

            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>





    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>




</body>

</html>