<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="produtos-titulo">Entre em Contato</h1>
        <p class="produtos-subtitulo">
            Ficou com alguma dúvida? Estamos aqui para ajudar!
        </p>
    </div>

    <div class="row g-4 justify-content-center">

        <!-- Informações de contato -->
        <div class="col-12 col-md-5">

            <div class="card h-100 shadow-sm">
                <div class="card-body p-4">

                    <h3 class="mb-4">
                        <i class="bi bi-info-circle"></i>
                        Fale conosco
                    </h3>

                    <p>
                        Entre em contato com a nossa equipe através dos
                        canais abaixo.
                    </p>

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <i class="bi bi-telephone-fill fs-4"></i>
                        <div>
                            <strong>Telefone</strong>
                            <p class="mb-0">(44) 99999-9999</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <i class="bi bi-envelope-fill fs-4"></i>
                        <div>
                            <strong>E-mail</strong>
                            <p class="mb-0">contato@lojajeletro.com</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-geo-alt-fill fs-4"></i>
                        <div>
                            <strong>Endereço</strong>
                            <p class="mb-0">
                                Rua Principal, 100<br>
                                Terra Boa - PR
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Formulário -->
        <div class="col-12 col-md-6">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h3 class="mb-4">
                        <i class="bi bi-chat-dots"></i>
                        Envie uma mensagem
                    </h3>

                    <form method="POST">

                        <div class="mb-3">
                            <label for="nome" class="form-label">
                                Nome
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="nome"
                                name="nome"
                                placeholder="Digite seu nome"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                E-mail
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Digite seu e-mail"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="assunto" class="form-label">
                                Assunto
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="assunto"
                                name="assunto"
                                placeholder="Digite o assunto"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="mensagem" class="form-label">
                                Mensagem
                            </label>

                            <textarea
                                class="form-control"
                                id="mensagem"
                                name="mensagem"
                                rows="5"
                                placeholder="Digite sua mensagem"
                                required
                            ></textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-send"></i>
                            Enviar mensagem
                        </button>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>