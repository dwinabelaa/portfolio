<?php
function get_CURL($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?key=AIzaSyD5Byc780_T5AEImRdXeimo92yJgsz7NHA&id=UC8Xx9vEHuFffMpNAIMp61jw&part=snippet,statistics');

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscribers = $result['items'][0]['statistics']['subscriberCount'];

// latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyD5Byc780_T5AEImRdXeimo92yJgsz7NHA&channelId=UC8Xx9vEHuFffMpNAIMp61jw&maxResults=1&part=snippet&order=date';
$result = get_CURL($urlLatestVideo);
$latestVideoId = $result['items'][0]['id']['videoId'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Portfolio | Dwi Nabela</title>

    <!-- Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body id="home">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm fixed-top" style="background-color: #82AAE3;">
        <div class="container-fluid ms-5 me-5">
            <a class="navbar-brand" href="#">Dwi Nabela</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sociak">Socmed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <section class="jumbotron text-center">
        <img src="img/picture4.jpg" alt="Profile" width="200" class="rounded-circle img-thumbnail">
        <h1 class="display-4">Dwi Nabela</h1>
        <p class="lead">Mahasiswa | Universitas Lambung Mangkurat</p>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,64L80,90.7C160,117,320,171,480,160C640,149,800,75,960,53.3C1120,32,1280,64,1360,80L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- About -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-5">
                    <h2>About Me</h2>
                </div>
            </div>
            <div class="row justify-content-center fs-5 text-center">
                <div class="col-md-4">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis tempore at corrupti et
                        perferendis consectetur rem minima harum recusandae ducimus.</p>
                </div>
                <div class="col-md-4">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque, necessitatibus velit modi
                        voluptatum, voluptatibus cum culpa deserunt perferendis vitae impedit dolor, enim sit quam
                        quaerat?</p>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#bfeaf5" fill-opacity="1" d="M0,96L80,106.7C160,117,320,139,480,128C640,117,800,75,960,85.3C1120,96,1280,160,1360,192L1440,224L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- Akhir About -->

    <!-- YT -->
    <section class="social" id="social" style="background-color: #BFEAF5;">
        <div class="container">
            <div class="row pt-4 mb-4">
                <div class="col text-center">
                    <h2>Social Media</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5><?= $channelName; ?></h5>
                            <p><?= $subscribers; ?> Subscribers</p>
                            <div class="g-ytsubscribe" data-channelid="UC8Xx9vEHuFffMpNAIMp61jw" data-layout="default" data-count="default"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pt-3 mb-3">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/<?= $latestVideoId; ?>?rel=0" title="YouTube video" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="img/projects/1.jpg" width="200" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5>@dwinabelaa_</h5>
                            <p>20 Fols</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col  pt-3 mb-3">
                            <div class="ig-thumbnail">
                                <img src="img/projects/2.jpg" width="200">
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,208C384,203,480,181,576,197.3C672,213,768,267,864,277.3C960,288,1056,256,1152,224C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>
    <!-- Akhir -->

    <!-- Projects -->
    <section id="projects" style="background-color: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-3">
                    <h2>My Projects</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="img/projects/1.jpg" class="card-img-top" alt="Project 1">
                        <div class="card-body">
                            <p class="card-text">Sistem Informasi Toko Komputer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="img/projects/2.jpg" class="card-img-top" alt="Project 2">
                        <div class="card-body">
                            <p class="card-text">Sistem Informasi Pembelajaran Bahasa Inggris</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="img/projects/3.jpg" class="card-img-top" alt="Project 3">
                        <div class="card-body">
                            <p class="card-text">Sistem Informasi Toko Sembako</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,288L48,282.7C96,277,192,267,288,229.3C384,192,480,128,576,138.7C672,149,768,235,864,261.3C960,288,1056,256,1152,234.7C1248,213,1344,203,1392,197.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>
    </section>
    <!-- Akhir Projects -->

    <!-- Contact -->
    <section id="contact">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#BFEAF5" fill-opacity="1" d="M0,128L48,138.7C96,149,192,171,288,202.7C384,235,480,277,576,277.3C672,277,768,235,864,208C960,181,1056,171,1152,186.7C1248,203,1344,245,1392,266.7L1440,288L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
        <div style="background-color: #BFEAF5;">
            <div class="row">
                <div class="col text-center mb-3">
                    <h2>Contact Me</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" class="form-control" id="email" aria-describedby="email">
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Contact -->

    <!-- Footer -->
    <footer style="background-color: #82AAE3;" class="text-black text-center pb-5">
        <p>Created with <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-through-heart text-danger" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l.53-.53c-.771-.802-1.328-1.58-1.704-2.32-.798-1.575-.775-2.996-.213-4.092C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182a21.86 21.86 0 0 1-2.685-2.062l-.539.54V14a.5.5 0 0 1-.146.354l-1.5 1.5Zm2.893-4.894A20.419 20.419 0 0 0 8 12.71c2.456-1.666 3.827-3.207 4.489-4.512.679-1.34.607-2.42.215-3.185-.817-1.595-3.087-2.054-4.346-.761L8 4.62l-.358-.368c-1.259-1.293-3.53-.834-4.346.761-.392.766-.464 1.845.215 3.185.323.636.815 1.33 1.519 2.065l1.866-1.867a.5.5 0 1 1 .708.708L5.747 10.96Z" />
            </svg> by <a href="https://www.instagram.com/dwinabelaa_/" class="text-black fw-bold">Dwi
                Nabela</a></p>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>