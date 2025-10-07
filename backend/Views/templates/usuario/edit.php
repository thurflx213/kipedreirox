<div>Sou o create</div>
  <form action="/backend/usuario/atualizar/<?php echo $usuario['id_usuario']; ?>" method="post" 
   enctype="multipart/form-data">
   <label for="nome">Nome:</label>
   <input type="text" id="nome_usuario" name="nome_usuario" value="<?php echo $usuario['nome_usuario']; ?>" required>
   <br>
   <label for="email">Email:</label>
   <input type="email" id="email_usuario" name="email_usuario" value="<?php echo $usuario['email_usuario']; ?>" required>
   <br>
   <label for="senha">Senha:</label>
   <input type="password" id="senha_usuario" name="senha_usuario" value="" required>
   <br>
   <label for="tipo">Tipo:</label>
   <select id="tipo_usuario" name="tipo_usuario" value="<?php echo $usuario['tipo_usuario'] ?>" required>
   <option value="user">Usuario</option>
   <option value="admin" >Administrador</option>
   </select><br>
   <label for="imagem">Imagem:</label>
   <input type="file" id="imagem" name="imagem" accept="image/*">
   <button type="submit">Salvar</button>
   </form>
