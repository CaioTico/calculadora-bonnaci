<!DOCTYPE html>
<html>

<head>
    <title>Calculadora Fibonacci</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ddd;
            margin: 0;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: auto;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type='submit'] {
            background-color: #9500cf;
            /* Cor de fundo normal */
            color: white;
            /* Cor do texto */
            border: none;
            /* Remover borda */
            padding: 10px 20px;
            /* Espaçamento interno */
            cursor: pointer;
            /* Cursor ao passar o mouse */
            border-radius: 5px;
            /* Bordas arredondadas */
            transition: background-color 0.3s;
            /* Transição suave da cor de fundo */
        }

        input[type='submit']:hover {
            background-color: #5e0083;
            /* Cor de fundo ao passar o mouse */
        }

        .resultados {
            margin-top: 20px;
            color: #9500cf;
            font-weight: bold;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="resultados">

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h2>Calculadora Fibonacci</h2>
                <p>Digite o número desejado:</p>
                <input type="number" name="numero" min="1" required>
                <input type="submit" name="submit" value="Calcular">


                <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = $_POST["numero"];
            if ($numero < 1) {
                // Mensagem de erro se o número inserido for menor que 1
                echo "<p class='result'>Por favor, insira um número maior que zero.</p>";
            } else {
                // Função para calcular a sequência de Fibonacci
                function fibonacci($n) {
                    $fibonacci_sequence = [];
                    $fibonacci_sequence[0] = 0;
                    $fibonacci_sequence[1] = 1;

                    for ($i = 2; $i <= $n; $i++) {
                        $fibonacci_sequence[$i] = $fibonacci_sequence[$i - 1] + $fibonacci_sequence[$i - 2];
                    }

                    return $fibonacci_sequence;
                }

                // Exibição dos resultados da sequência de Fibonacci
                echo "<p class='resultados'>Na sequência de Fibonacci, o resultado para $numero seria: " . fibonacci($numero)[$numero] . "</p>";
                echo "<p class='resultados'>Outros resultados anteriores na sequência:</p>";
                $sequence = fibonacci($numero);
                for ($i = 0; $i <= $numero; $i++) {
                    echo "<span class='result'>" . $sequence[$i] . ", </span>";
                }
            }
        }
        ?>
            </form>
        </div>
    </div>

</body>

</html>


<!-- 
    RESUMO PEGO DO CHAT GPT para explicar o cálculo logo abaixo.
        |                                               |
        |                                               |
        V                                               V

-->
<!-- 

function fibonacci($n) {: Esta linha define uma função chamada fibonacci() que aceita um parâmetro $n, que é o número desejado na sequência de Fibonacci.

$fibonacci_sequence = [];: Aqui, é inicializado um array vazio chamado $fibonacci_sequence que será utilizado para armazenar os números da sequência de Fibonacci.

$fibonacci_sequence[0] = 0; e $fibonacci_sequence[1] = 1;: Os primeiros dois números da sequência de Fibonacci são definidos manualmente como 0 e 1, respectivamente. Esses são os casos base da sequência.

for ($i = 2; $i <= $n; $i++) {: Este é um loop for que começa a partir do terceiro número na sequência (índice 2) e continua até o número desejado $n.

$fibonacci_sequence[$i] = $fibonacci_sequence[$i - 1] + $fibonacci_sequence[$i - 2];: Nesta linha, cada número subsequente na sequência de Fibonacci é calculado somando os dois números anteriores. Isso segue a regra da sequência de Fibonacci, onde cada número é a soma dos dois números anteriores.

return $fibonacci_sequence;: Finalmente, a função retorna o array completo contendo todos os números da sequência de Fibonacci até o número desejado.

Em resumo, essa função calcula e retorna uma sequência de Fibonacci até o número especificado $n, usando um loop for para calcular cada número com base nos dois números anteriores. -->