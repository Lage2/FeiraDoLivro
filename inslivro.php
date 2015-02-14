<?php header("Content-Type: text/html; charset=ISO-8859-1",true);
include 'db_connect.php';
include 'functions.php';
include 'db_clientes_connect.php';
sec_session_start();
if(login_check($mysqli) == true) {

$pedido = "INSERT INTO book (isbn, name, author1, author2)VALUES (";
$pedido .= "'".$_POST['isbn']."',";
$pedido .= "'".$_POST['nome']."',";
$pedido .= "'".$_POST['autor1']."',";
$pedido .= "'".$_POST['autor2']."')";
mysqli_query($mysqli_client,$pedido) or die(mysqli_error($mysqli_client));



//Guarda na variável $image o nome completo da imagem (nome+extensão)
        $image = $_FILES['imagem']['name'];
		define ("MAX_SIZE","100");
		
        //Verifica se existe alguma imagem para ser importada
        if($image)//Existe uma imagem para ser importada
        {
            //Retira os elementos "/"
            $filename = stripslashes($_FILES['imagem']['name']);

            //Verifica qual a extensão do ficheiro
            $extension = getExtension($filename);

            //Coloca todos os caracteres da extensão com letra minúscula
            $extension = strtolower($extension);
			
            //Verifica os formatos de imagem que podem ser importados
            if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "gif"))//Formato diferente dos permitidos 
            {
                //print error message
                 echo "<strong>Imagem:</strong> Este formato não pode ser importado! Utilize o formato jpg ou gif";
            }
            else//Formato permitido
            {
                //Verifica qual o tamanho da imagem seleccionada
                 $size=filesize($_FILES['imagem']['tmp_name']);

                //Verifica se o tamanho é superior a 100kb
                if ($size > MAX_SIZE*1024)//tamanho superior
                {
                    echo "A imagem nao pode exeder o tamanho de 100kb";
                }
                else//tamanho inferior
                {
                    //Gera um nome para a imagem
                    $image_name=$_POST['isbn'].'.'.$extension;
					echo $image_name;

                    //Directoria para a qual a imagem será enviada
                    $newname="images/".$image_name;

                    //Efectua o upload da imagem para a directoria
                    $copied = copy($_FILES['imagem']['tmp_name'], $newname);

                    //Verifica se o upload foi efectuado com sucesso
                    if ($copied) //Upload bem sucedido
                    {
                        echo "Upload da imagem foi efectuado com sucesso";         
                    }
                    else//Upload mal sucedido
                    {
                        echo "Não foi possível efectuar o upload da imagem";
                    }
                }
            }
        }
        else//Não existe nenhuma imagem para ser importada 
        {
            echo "Seleccione uma imagem";
        }    
header('Location: ./livrook.php');

} else {
   header('Location: ./login.php');
}
// Função que permite saber qual a extensão da imagem
function getExtension($str){
    $i = strrpos($str,".");
    if (!$i) return ""; 
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}

?>