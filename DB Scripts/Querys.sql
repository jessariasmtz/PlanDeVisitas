/*Ver info de Empresa*/
SELECT Empresas.Nombre, Empresas.Tipo, Contactos.Nombre, Contactos.Apellido, Contactos.Email, Sucursales.AreaUbicacion, Sucursales.Direccion
FROM  Empresas INNER JOIN Contactos ON Empresas.ID = Contactos.EmpresaID 
INNER JOIN Sucursales ON Empresas.ID = Sucursales.EmpresaID;

select * from Visitas;