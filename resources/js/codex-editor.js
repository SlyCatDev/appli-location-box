import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import Paragraph from '@editorjs/paragraph';

// document.addEventListener('DOMContentLoaded', () => {
//   const contentElement = document.getElementById('content');
//   let initialData = { blocks: [] };

//   // Tenter de parser le JSON initial, avec fallback en cas d'erreur
//   if (contentElement && contentElement.value) {
//     try {
//       initialData = JSON.parse(contentElement.value);
//     } catch (error) {
//       console.error("Erreur lors du parsing du JSON initial :", error);
//     }
//   }

//   // Initialisation de l'éditeur et assignation à une variable globale
//   window.editor = new EditorJS({
//     holder: 'editor',
//     placeholder: 'Commence à rédiger ton contenu ici...',
//     tools: {
//       header: Header,
//       paragraph: Paragraph,
//     },
//     data: initialData,
//   });

//   // Gestion de la soumission du formulaire
//   const form = document.getElementById('editor-form');
//   form.addEventListener('submit', async function (e) {
//     e.preventDefault();
//     try {
//       const outputData = await window.editor.save();
//       contentElement.value = JSON.stringify(outputData);
//       form.submit();
//     } catch (error) {
//       console.error('Erreur lors de la sauvegarde du contenu :', error);
//       alert('Quelque chose s’est mal passé lors de l’enregistrement du modèle !');
//     }
//   });
// });
