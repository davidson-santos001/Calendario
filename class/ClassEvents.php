<?php 
namespace Classes;

use Models\modelConect;
use mysqli;

class ClassEvents extends ModelConect
{
    # trazer os dados de eventos do banco de dados 
    public function pegarEventos()
    {
        // selecionando ou chamando todos os eventos do DB 
        $b=$this->conectDB()->prepare ("SELECT * from events");
        $b->execute();
        // variavel $f chamando 
        $f=$b->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($f);
    }

    #criação da consulta no banco 
    public function criarEventos($id=0,$title,$start,$fim,$description,$campus,$reserva,$color)
    {
        //Pega os horários de inicio do banco
        $inicio=$this->conectDB()->prepare("SELECT hour(start) as hourI, minute(start) as minuteI, hour(end) as hourF, minute(end) as minuteF FROM events");
        $inicio->execute();
        $allStart=$inicio->fetchAll();

        //Pega os horários informados iniciais para inserir no banco. Sendo [0] para hora e [1] para minuto
        //Horário inicial do agendamento
        $horaStart = explode(' ',$start);
        $getHoraCompletaI = $horaStart[1];
        $getHoraI = explode(':',$getHoraCompletaI);        
        $horaI = $getHoraI[0];
        $minutoI = $getHoraI[1];

        //Horário final do agendamento
        $horaFim = explode(' ',$fim);
        $getHoraCompletaF = $horaFim[1];
        $getHoraF = explode(':',$getHoraCompletaF);        
        $horaF = $getHoraF[0];
        $minutoF = $getHoraF[1];
        
        //Valida os horários existentes no banco, com os valores a serem inseridos
        foreach($allStart as $value){
            //Devera ser criada condicionais para verificar o horário de inicio do evento
            if($value['hourI'] == $horaI && $value['minuteI'] < $minutoI){
                $this->verificaData($horaI, $horaF, $value['hourI']);
                //Devera ser criadas validações para ver se o fim do evento acontece antes do próximo evento
                if($value['hourF'] >= $horaF && $value['minuteF'] > $minutoF){
                    //Retorna que o horário de agendamento é válido. Pois o termino ocorre antes do próximo evento
                }
                // echo($start . ' - ' . $value['hourI'] . ':' . $value['minuteI']);
            }
            elseif($value['hourI'] == $horaI && $value['minuteI'] < $minutoI){
                //Devera ser criadas validações para ver se o fim do evento acontece antes do próximo evento
                if($value['hourF'] >= $horaF && $value['minuteF'] > $minutoF){
                    //Retorna que o horário de agendamento é válido. Pois o termino ocorre antes do próximo evento
                }
                // echo($start . ' - ' . $value['hourI'] . ':' . $value['minuteI']);
            }
            
        }
  


        $b=$this->conectDB()->prepare("INSERT into events values (?,?,?,?,?,?,?,?) ");
        $b->bindParam(1,$id, \PDO::PARAM_INT);
        $b->bindParam(2,$title, \PDO::PARAM_STR);
        $b->bindParam(3,$start, \PDO::PARAM_STR);
        $b->bindParam(4,$fim, \PDO::PARAM_STR);
        $b->bindParam(5,$description, \PDO::PARAM_STR);
        $b->bindParam(6,$campus, \PDO::PARAM_STR);
        $b->bindParam(7,$reserva, \PDO::PARAM_STR);
        $b->bindParam(8,$color, \PDO::PARAM_STR);
        $b->execute();
    }

    //Chama função para verificar se a data de agendamento existe dentro do intervalo de inicio e fim
    public function verificaData($inicio, $fim, $dataAgendamento){
        
        //Cria um array que vai do horario inicial ao final
        $dt = range($inicio, $fim);
        //verifica se existe o horário desejado dentro do array
        if(in_array($dataAgendamento,$dt)){
            return 'indisponivel';
        }else{
            return 'disponivel';
        }
    }

    // buscar eventos atraves do id 
    public function buscaEventoPorId($id)
    {
        // False because $b is NULL

        
        $sql=("SELECT * from events  WHERE id = ".$id);
        $b=$this->conectDB()->prepare ($sql);
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->execute();
            $f=$b->fetch(\PDO::FETCH_ASSOC);

            return ($f);
        
    }

    //update no banco de dados 
    #Atualização dos dados no banco
    public function editarEventos($id,$title,$start,$fim,$description,$campus,$reserva,$color)  
    {
        $eventosAgendados = array();
        $eventosAgendados = $this->pegarEventos();
        $conn=$this->conectDB();
        
        $query = "UPDATE events SET";
        $comma = " ";

        //$key recebe o indice do $POST, $val recebe o valor
        foreach($_POST as $key => $val) {
            //Verifica se os valores não estão vazios
            if( ! empty($val)) {
                //Verifica os indices e muda pro nome da coluna da tabela events
                if($key == 'idForm'){
                    continue;
                }
                if($key == 'cor'){
                    $key = 'color';
                }
                //Monta o campo da data inicio
                //Tu dps vai ter que criar uma verificação melhor, caso alguém selecione vários dias seguidos
                if($key == 'date'){
                    $key = 'start';
                    //Para verificar a data, vc deve rodar a query para buscar todos os cursos agendados e comparar a data neste ponto. Pois vai ter a data de inicio completa
                    $val = $_POST['date'].' '. $_POST['time'];  
                }
                if($key == 'time'){
                    continue;
                }
                if($key == 'date'){
                    $key = 'end';
                    //Para verificar a data, vc deve rodar a query para buscar todos os cursos agendados e comparar a data neste ponto. Pois vai ter a data de fim completa
                    $val = $_POST['date'].' '. $_POST['time'];  
                }
                if($key == 'time'){
                    continue;
                }
                //Monta o campo da data fim
                //Tu dps vai ter que criar uma verificação melhor, caso alguém selecione vários dias seguidos
                if($key == 'fim'){
                    $key = 'end';
                    //Para verificar a data, vc deve rodar a query para buscar todos os cursos agendados e comparar a data neste ponto. Pois vai ter a data de fim completa
                    $val = $_POST['date'].' '. $_POST['fim'];
                }
                $query .= $comma . $key . " = '" . trim($val) . "'";
                $comma = ", ";
            }
        }
        //Ao montar a query completa é feita a execução
        $b=$conn->prepare($query . ' WHERE id = ' . $_POST['idForm']);
        $b->execute();
        // var_dump($b);die;
    }
    //Deletar no banco de dados 
    public function deleteEvento($id)  
    {
        $b=$this->conectDB()->prepare("DELETE FROM events WHERE id=?");
        $b->bindParam(1,$id, \PDO::PARAM_INT);
        $b->execute();

    }

    
}
?>