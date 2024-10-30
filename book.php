<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">


    <title>Interactive Flipbook</title>
</head>
<body>
    <input type="checkbox" id="checkbox-cover" />
    <input type="checkbox" id="checkbox-page1" />
    <input type="checkbox" id="checkbox-page2" />
    <input type="checkbox" id="checkbox-page3" />

    <div class="book">
        <div class="cover">
            <label for="checkbox-cover"></label>
        </div>
        <div class="page" id="page1">
            <div class="front-page">
                <h2>Page 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil magni laudantium beatae quia...</p>
                <label class="next" for="checkbox-page1"><i class='bx bx-chevron-right' ></i></label>
            </div>
            <div class="back-page">
                <img src="images/s1.jpg" alt="Back of Page 1" />
                <label class="prev" for="checkbox-page1"><i class='bx bx-chevron-left' ></i></label>
            </div>
        </div>
        <div class="page" id="page2">
            <div class="front-page">
                <h2>Page 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil magni laudantium beatae quia...</p>
                <label class="next" for="checkbox-page2"><i class='bx bx-chevron-right' ></i></label>
            </div>
            <div class="back-page">
                <img src="images/s2.jpg" alt="Back of Page 2" />
                <label class="prev" for="checkbox-page2"><i class='bx bx-chevron-left' ></i></label>
            </div>
        </div>
        <div class="page" id="page3">
            <div class="front-page">
                <h2>Page 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil magni laudantium beatae quia...</p>
                <!-- <label class="prev" for="checkbox-page2"><i class='bx bx-chevron-left' ></i></label> -->
            </div>
        </div>
        <div class="back-cover"></div>
    </div>
</body>
<style>
    body {
    font-family: "Poppins", sans-serif;
    background-color: #2e3537;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
}

.book {
    width: 350px;
    height: 450px;
    position: relative;
    transition-duration: 1s;
    perspective: 1500px;
}

input {
    display: none; /* Hide radio buttons */
}

.cover, .back-cover {
    background-color: #4173a5;
    width: 100%;
    height: 100%;
    border-radius: 0 15px 15px 0;
    box-shadow: 0 0 5px rgb(41, 41, 41);
    display: flex;
    align-items: center;
    justify-content: center;
    transform-origin: center left;
    position: absolute;
    z-index: 4;
    transition: transform 1s;
}

.cover label {
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.back-cover {
    position: relative;
    z-index: -1;
}

.page {
    position: absolute;
    background-color: white;
    width: 330px;
    height: 430px;
    border-radius: 0 15px 15px 0;
    margin-top: 10px;
    transform-origin: left;
    transform-style: preserve-3d;
    transform: rotateY(0deg);
    transition-duration: 1.5s;
}

.page img {
    width: 100%;
    height: 100%;
    border-radius: 15px 0 0 15px;
}

.front-page {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    box-sizing: border-box;
    padding: 1rem;
}

.back-page {
    transform: rotateY(180deg);
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
}

.next, .prev {
    position: absolute;
    bottom: 1em;
    cursor: pointer;
}

.next {
    right: 1em;
}

.prev {
    left: 1em;
}

#page1 {
    z-index: 3;
}

#page2 {
    z-index: 2;
}

#page3 {
    z-index: 1;
}

/* Flip effects */
#checkbox-cover:checked ~ .book {
    transform: translateX(200px);
}

#checkbox-cover:checked ~ .book .cover {
    transition: transform 1.5s, z-index 0.5s 0.5s;
    transform: rotateY(-180deg);
    z-index: 1;
}

#checkbox-cover:checked ~ .book .page {
    box-shadow: 0 0 3px rgb(99, 98, 98);
}

#checkbox-page1:checked ~ .book #page1 {
    transform: rotateY(-180deg);
    z-index: 2;
}

#checkbox-page1:checked ~ .book #page2 {
    z-index: 3; /* Ensure page 2 is above when page 1 is flipped */
}

#checkbox-page2:checked ~ .book #page2 {
    transform: rotateY(-180deg);
    z-index: 2;
}

#checkbox-page2:checked ~ .book #page3 {
    z-index: 3; /* Ensure page 3 is above when page 2 is flipped */
}

</style>
</html>
