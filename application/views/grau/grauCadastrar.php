 
    
      <div class="col-xs=10 col-sm-10 col-md-10">
        <form id="formGrau" method="Post" >
          <div class="form-group" >
            
              <label>Nome:</label>
        
               
              
                
                <input type="text"
               
                class="form-control"
                id="nome"
                name="nome" 
             
                placeholder="Ex:Tecnólogo" 
                value="<?= set_value('nome_grau') ?>" 
                />


            </div>
        

            <div class="form-group">
              <label>Codigo:</label>
              <input type="number" 
                class="form-control"
                id="codigo"
                name="codigo"
                placeholder="Código da Modalidade"
                value="<?= set_value('codigo') ?>"
                />
            </div>
       
          <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-lg active" style="margin-top: 30px;">Cadastrar</button>
                          <button type="button" class="btn btn-danger btn-lg active" style="margin-top: 30px;">Cancelar</button>
                      </div>
        </form>
      </div>  

  
