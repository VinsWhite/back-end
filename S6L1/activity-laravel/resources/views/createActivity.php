<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Aggiungi attività</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-success-subtle">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold text-success fs-3" href="#">ACTIVITY</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cerca attività..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Cerca</button>
                </form>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-4" style="height: 100vh;">
        <h1 class="fw-semibold">Aggiungi attività</h1>

        <section>
            <form class="bg-success-subtle shadow border-2 border-success p-4 text-mute rounded-3">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titolo attività <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Scegli il nome di un'attività divertente!</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Descrizione attività <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 border-top border-dark pt-3">
                    <label for="nomeAutore" class="form-label">Nome autore <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nomeAutore">
                </div>
                <button type="submit" class="btn btn-success">Aggiungi</button>
            </form>
        </section>

        <section class="pt-3">
            <h3>Esercizio di prova statico</h3>
            <p>Questo è un esercizio di prova statico per provare le rotte di Laravel.</p>
        </section>
    </main>

    <footer class="bg-success text-light py-3 text-center mt-4">
        <p>&copy; Vincenzo Saccone</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>