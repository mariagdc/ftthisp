Sistema de Gestión FTTH
📖 Descripción General

Sistema moderno de gestión de redes Fiber-to-the-Home (FTTH) basado en Laravel 12. Esta aplicación permite administrar OLT, ODP, cables de fibra, clientes y áreas geográficas (por ejemplo: datos de prueba de la región de Bengkulu). Incluye autenticación basada en roles (administrador y técnico) y una interfaz premium adaptable.

🎯 Características Principales
- Autenticación Multi-Rol
  - Administrador: Acceso completo para gestionar usuarios, red, reportes y configuraciones del sistema.
  - Técnico: Gestión de OLT, ODP, cables de fibra y datos de clientes.
- Gestión de Red FTTH
  - CRUD de OLT, ODP, FiberCable, Customer y Area.
  - Visualización de coordenadas (lat/lng) para cada elemento de red.
- Seeder de Datos de Prueba
  - Datos aleatorios para OLT, ODP, cables, clientes y áreas de Bengkulu.
- Interfaz Moderna y Premium
  - Diseño oscuro, animaciones suaves, tipografía de Google Fonts y componentes reutilizables.
- Reportes y Auditoría
  - Resumen de red, estado de OLT/ODP y reportes de clientes.
🛠️ Stack Tecnológico
- Backend: Laravel 12, PHP 8.3, MySQL/PostgreSQL
- Frontend: Blade, CSS Vanilla (sistema de diseño personalizado), JavaScript
- Base de Datos: Eloquent ORM, migraciones y seeders
- Testing: PHPUnit (unitario y funcional)
- Control de Versiones: Git + GitHub
📋 Requisitos Previos
- PHP >= 8.3
- Composer
- Base de datos (MySQL/PostgreSQL)
- Node.js & npm (opcional para compilación de assets)
🚀 Instalación
# Clonar el repositorio
git clone https://github.com/rizkylab/ftthisp.git
cd ftthisp

# Instalar dependencias PHP
composer install

# Copiar archivo env y configurar credenciales de base de datos
cp .env.example .env
# editar .env según corresponda

# Generar la clave de la aplicación
php artisan key:generate

# Ejecutar migraciones y seeders (incluye datos de prueba de Bengkulu)
php artisan migrate
php artisan db:seed

# Compilar assets (opcional)
npm install && npm run dev

# Iniciar servidor de desarrollo
php artisan serve

Acceder a la aplicación en http://127.0.0.1:8000.

👤 Credenciales por Defecto
Rol	Email	Contraseña
Administrador	admin@example.com
	password
Técnico	tech@example.com
	password
📁 Estructura del Proyecto
app/
  Models/             # Modelos Eloquent (Olt, Odp, FiberCable, Customer, Area, User, Role)
  Http/Controllers/   # Controladores CRUD

database/
  migrations/         # Definiciones de esquemas
  seeders/            # Datos de prueba (AreaSeeder agrega Bengkulu)

resources/
  views/              # Plantillas Blade (dashboard, interfaz CRUD)

public/
  css/ js/            # Assets compilados
✅ Funcionalidades Implementadas
Fase 1: Configuración inicial del proyecto y base de Laravel
Fase 2: Esquema completo de base de datos (OLT, ODP, cables, clientes, áreas)
Fase 3: Autenticación y autorización por roles
Fase 4: Interfaz CRUD premium para todas las entidades
Fase 5: Seeder de datos de prueba incluyendo la región de Bengkulu
🔧 Configuración
Configuración del Sistema: config/app.php y .env para modo debug, zona horaria, etc.
Ubicación de Oficina: Las coordenadas predeterminadas para el área de Bengkulu pueden modificarse en database/seeders/AreaSeeder.php.
📱 Uso
Administrador: Dashboard completo, gestión de usuarios y reportes de red.
Técnico: Agregar/modificar OLT, ODP, cables y clientes.
Cliente (solo lectura): Ver detalles del servicio mediante endpoints API (opcional).
🎨 Personalización
Modo Oscuro: Sigue automáticamente las preferencias del sistema.
Logo de la Empresa: Reemplazar el archivo public/logo.png.
Tema de Colores: Editar variables CSS en resources/css/app.css.
📊 Reportes
Resumen de red (cantidad de OLT, ODP y cables activos).
Estado de puertos OLT y capacidad de ODP.
Lista de clientes por ODP.
Exportación PDF/Excel (mejora futura).
🔐 Seguridad
Hashing de contraseñas mediante Hash::make.
Middleware auth y role para proteger rutas.
Validación de entradas en todos los endpoints.
🐛 Solución de Problemas
Error de conexión a la base de datos: Verificar que las credenciales en .env sean correctas y que el servidor DB esté funcionando.
Assets no cargan: Ejecutar npm install && npm run dev o php artisan view:clear.
Permiso denegado: Verificar que las carpetas storage y bootstrap/cache tengan permisos de escritura (chmod -R 775).
📄 Licencia

Licencia MIT – consultar el archivo LICENSE para más detalles.

👨‍💻 Desarrollador

Rizky Lab – GitHub de Rizky Lab

🙏 Créditos
Comunidad Laravel
Font Awesome y Google Fonts (Inter)
Recursos de íconos de Lucide

¡Gracias por utilizar el Sistema de Gestión FTTH!