<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Csvimport {
    private $handle = "";
    private $filepath = FALSE;
    private $column_headers = FALSE;
    private $initial_line = 0;
    private $delimiter = ",";
    private $detect_line_endings = FALSE;
   /**
     * Faz um parse do CSV e retorna os dados como um array
     *
     * @access  public
     * @param   filepath             string   path do arquivo CSV
     * @param   column_headers       array    Valores que serão utilizados como as chaves do array, e que ficam na primeira linha do CSV
     * @param   detect_line_endings  boolean  Verifica se existe o marcador de fechamento de linha
     * @param   initial_line         integer  Determina a linha inicial do CSV
     * @param   delimiter            string   O delimitador (e.g. ";" ou ",").
     * @return  array
     */
    public function get_array($filepath=FALSE, $column_headers=FALSE, $detect_line_endings=FALSE, $initial_line=FALSE, $delimiter=FALSE)
    {
        // Define o limite de memória
        ini_set('memory_limit', '20M');
        // Path do arquivo
        if(! $filepath)
        {
            $filepath = $this->_get_filepath();
        }
        else
        {
            // Define o path
            $this->_set_filepath($filepath);
        }
        // Retorna false se o arquivo não existir
        if(! file_exists($filepath))
        {
            return FALSE;
        }
        // detecta o final da linha
        if(! $detect_line_endings)
        {
            $detect_line_endings = $this->_get_detect_line_endings();
        }
        else
        {
            // Define a detecção do final da linha
            $this->_set_detect_line_endings($detect_line_endings);
        }
        // Se for true, define a detecção do final de linha no ini_set
        if($detect_line_endings)
        {
            ini_set("auto_detect_line_endings", TRUE);
        }
        // Parse pra linha inicial
        if(! $initial_line)
        {
            $initial_line = $this->_get_initial_line();
        }
        else
        {
            $this->_set_initial_line($initial_line);
        }
        // Delimitador
        if(! $delimiter)
        {
            $delimiter = $this->_get_delimiter();
        }
        else
        {
            // Define o delimitador
            $this->_set_delimiter($delimiter);
        }
        // Nomes das colunas de dados
        if(! $column_headers)
        {
            $column_headers = $this->_get_column_headers();
        }
        else
        {
            // Define o nome das colunas de dados
            $this->_set_column_headers($column_headers);
        }
        // Abre o CSV para leitura
        $this->_get_handle();
        $row = 0;
        while (($data = fgetcsv($this->handle, 0, $this->delimiter)) !== FALSE)
        {
            if($row < $this->initial_line)
            {
                $row++;
                continue;
            }
            // Se a linha for a primeira, verifica os cabeçalhos
            if($row == $this->initial_line)
            {
                // Se column_headers existe, então usa
                if($this->column_headers)
                {
                    foreach ($this->column_headers as $key => $value)
                    {
                        $column_headers[$key] = trim($value);
                    }
                }
                else // Faz o parse da primeira linha pra uso
                {
                    foreach ($data as $key => $value)
                    {
                        $column_headers[$key] = trim($value);
                    }
                }
            }
            else
            {
                // necessário para que o array retornado inicie em 0 ao invés de 1
                $new_row = $row - $this->initial_line - 1;
                // monta o array definindo as chaves a partir das colunas definidas no CSV
                foreach($column_headers as $key => $value)
                {
                    $result[$new_row][$value] = utf8_encode(trim($data[$key]));
                }
            }
            unset($data);
            $row++;
        }
        $this->_close_csv();
        return $result;
    }
    /**
     * Define "detect_line_endings"
     *
     * @access  private
     * @param   detect_line_endings  bool  Valor
     * @return  void
     */
    private function _set_detect_line_endings($detect_line_endings)
    {
        $this->detect_line_endings = $detect_line_endings;
    }
    /**
     * Define "detect_line_endings"
     *
     * @access  public
     * @param   detect_line_endings  bool  Valor
     * @return  void
     */
    public function detect_line_endings($detect_line_endings)
    {
        $this->_set_detect_line_endings($detect_line_endings);
        return $this;
    }
    /**
     * Recupera o valor de "detect_line_endings"
     *
     * @access  private
     * @return  bool
     */
    private function _get_detect_line_endings()
    {
        return $this->detect_line_endings;
    }
    /**
     * Define a linha inicial
     *
     * @access  private
     * @param   initial_line    int  Valor da linha inicial
     * @return  void
     */
    private function _set_initial_line($initial_line)
    {
       return $this->initial_line = $initial_line;
    }
    /**
     * Define a linha inicial onde a análise irá começar
     *
     * @access  public
     * @param   initial_line    int  Linha
     * @return  void
     */
    public function initial_line($initial_line)
    {
        $this->_set_initial_line($initial_line);
        return $this;
    }
    /**
     * Recupera a linha inicial onde a análise irá começar
     *
     * @access  private
     * @return  int
     */
    private function _get_initial_line()
    {
        return $this->initial_line;
    }
    /**
     * Define o valor do delimitador
     *
     * @access  private
     * @param   initial_line    string  Delimitador (eg. "," ou ";")
     * @return  void
     */
    private function _set_delimiter($delimiter)
    {
        $this->delimiter = $delimiter;
    }
    /**
     * Define o valor do delimitador
     *
     * @access  public
     * @param   initial_line    string  Delimitador (eg. "," ou ";")
     * @return  void
     */
    public function delimiter($delimiter)
    {
        $this->_set_delimiter($delimiter);
        return $this;
    }
    /**
     * Recupera o valor do delimitador
     *
     * @access  private
     * @return  string
     */
    private function _get_delimiter()
    {
        return $this->delimiter;
    }
    /**
     * Define o path do arquivo CSV
     *
     * @access  private
     * @param   filepath    string  Path do arquivo
     * @return  void
     */
    private function _set_filepath($filepath)
    {
        $this->filepath = $filepath;
    }
    /**
     * Define o path do arquivo CSV
     *
     * @access  public
     * @param   filepath    string  Path do arquivo
     * @return  void
     */
    public function filepath($filepath)
    {
        $this->_set_filepath($filepath);
        return $this;
    }
    /**
     * Recupera o path do arquivo CSV
     *
     * @access  private
     * @return  string
     */
    private function _get_filepath()
    {
        return $this->filepath;
    }
   /**
     * Define as colunas que serão as chaves do array
     *
     * @access  private
     * @param   column_headers  array   Colunas de dados do arquivo CSV
     * @return  void
     */
    private function _set_column_headers($column_headers='')
    {
        if(is_array($column_headers) && !empty($column_headers))
        {
            $this->column_headers = $column_headers;
        }
    }
    /**
     * Define as colunas que serão as chaves do array
     *
     * @access  public
     * @param   column_headers  array   Colunas de dados do arquivo CSV
     * @return  void
     */
    public function column_headers($column_headers)
    {
        $this->_set_column_headers($column_headers);
        return $this;
    }
    /**
     * Define as colunas que serão as chaves do array
     *
     * @access  private
     * @return  mixed
     */
    private function _get_column_headers()
    {
        return $this->column_headers;
    }
   /**
     * Abre o arquivo CSV
     *
     * @access  private
     * @return  void
     */
    private function _get_handle()
    {
        $this->handle = fopen($this->filepath, "r");
    }
   /**
     * Fecha o CSV após concluir a manipulação
     *
     * @access  private
     * @return  array
     */
    private function _close_csv()
    {
        fclose($this->handle);
    }
}