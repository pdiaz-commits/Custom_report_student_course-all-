Custom Report Plugin for Moodle
(Tested with Moodle 4.5)

Overview

This custom Moodle plugin generates personalized progress reports for students enrolled in courses. It is designed as a local plugin compatible with Moodle 4.5 and provides detailed insights into course completion and individual progress.

Features

			Generates personalized reports for students.

			Displays course completion status and progress.

			Customizable report formats (e.g., PDF, CSV).

			Admin and teacher-level access to view and manage reports.

			Seamless integration with Moodle 4.5.



Installation

Download the plugin repository or clone it directly into your Moodle installation:

git clone

Move the plugin folder to the local directory in your Moodle root folder:

mv local/custom_report /path/to/moodle/local/

Navigate to your Moodle site as an administrator and follow the plugin installation prompts.

Once installed, navigate to Site Administration > Plugins > Local Plugins > Custom Report to configure the settings.




Usage

Generating Reports

	Log in as a teacher or admin.
	
	Navigate to the course for which you want to generate a report.
	
	Access the Custom Reports section under the course menu.
	
	Configure the report parameters (e.g., student name, date range, course completion criteria).
	
	Generate and download the report in your desired format (e.g., PDF or CSV).




Customization
	
	You can customize the plugin settings and report templates:
	
	Go to Site Administration > Plugins > Local Plugins > Custom Report.
	
	Adjust the settings to match your institution's reporting needs.
	
	Development



Prerequisites

Ensure you have the following:

Moodle 4.5 installed and running.

Access to the Moodle root directory.

PHP 7.4 or higher.






File Structure

The plugin follows Moodle's standard file structure:

local/custom_report/
|-- db/
|   |-- install.xml      # Database schema for the plugin
|-- lang/
|   |-- en/local_custom_report.php # Language strings
|-- classes/
|   |-- output/          # PHP classes for rendering reports
|-- templates/
|   |-- custom_report.mustache # HTML templates
|-- version.php          # Plugin version and requirements
|-- settings.php         # Plugin configuration settings
|-- lib.php              # Core library functions

Adding New Features

Modify db/install.xml to

-----------------
Spanish version
----------------


Plugin Local: Course Completion Report
Este plugin de Moodle permite a los administradores del sitio ver un informe sobre el estado de finalización de los cursos de un usuario específico. El informe muestra si un usuario ha completado los cursos y, en caso afirmativo, la fecha en que se completó cada uno de ellos.

Requisitos
Moodle 3.0 o superior.
Permisos de administrador del sitio para acceder al informe.
Instalación
Descargue el plugin y colóquelo en la carpeta local de su instalación de Moodle.

En su panel de administración de Moodle, acceda a Administración del sitio > Notificaciones. Moodle detectará el nuevo plugin y le pedirá que lo instale.

Una vez instalado, podrá acceder al informe desde el menú de administración, en Administración del sitio > Informes > Informe de finalización de curso.

Descripción
El plugin muestra una lista de los usuarios activos en el sitio y permite seleccionar uno para ver su progreso en los cursos. Para cada curso, el informe incluirá:

El nombre del curso.
El estado de finalización: si el curso ha sido completado o no.
La fecha de finalización del curso, si está disponible.
Funcionalidad
Selección de usuario:
El plugin permite a los administradores seleccionar un usuario del sistema. Si no se selecciona un usuario, se presenta una lista de todos los usuarios no eliminados del sitio.
Estado de finalización de cursos:
Para cada usuario seleccionado, el plugin consulta los cursos en los que está inscrito y verifica si ha completado el curso.
Si el curso está completado, se muestra la fecha de finalización. Si no se ha completado, se muestra "No completado".
Visualización:
El informe se presenta en formato de tabla para facilitar la lectura. En la tabla se incluyen enlaces a los cursos, lo que permite acceder fácilmente a la página del curso correspondiente.
Ejemplo de salida del informe

Nombre del Curso	Estado de Finalización	Fecha de Finalización
Curso A	Completado	2025-01-20
Curso B	No completado	-


Personalización
Idioma: El plugin soporta múltiples idiomas. Asegúrese de que las cadenas de texto estén traducidas en su idioma de preferencia.

Modificación de columnas: Si necesita personalizar las columnas del informe, puede modificar la estructura de la tabla en el código del plugin (en el archivo index.php).

Problemas comunes
No se muestra el informe: Asegúrese de que su usuario tenga permisos de administrador del sitio.
Los datos de finalización no son correctos: Verifique que la funcionalidad de finalización de curso esté activada y configurada correctamente en los cursos.
Licencia
Este plugin es de código abierto y se distribuye bajo la Licencia GPL.
