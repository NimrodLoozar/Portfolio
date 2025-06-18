// Longer, more realistic code for background
const codeLines = [
    "<span class=\"text-blue-400\">use</span> <span class=\"text-green-300\">App\\Models\\Project</span>;",
    "<span class=\"text-blue-400\">use</span> <span class=\"text-green-300\">Illuminate\\Support\\Facades\\DB</span>;",
    "",
    "<span class=\"text-blue-400\">function</span> <span class=\"text-yellow-300\">getFeaturedProjects</span>() {",
    "    <span class=\"text-blue-400\">return</span> Project::<span class=\"text-pink-400\">where</span>('featured', <span class=\"text-green-300\">true</span>)-><span class=\"text-pink-400\">take</span>(3)-><span class=\"text-pink-400\">get</span>();",
    "}",
    "",
    "<span class=\"text-blue-400\">function</span> <span class=\"text-yellow-300\">getAllSkills</span>() {",
    "    <span class=\"text-blue-400\">return</span> [",
    "        <span class=\"text-green-300\">'Laravel'</span>,",
    "        <span class=\"text-green-300\">'PHP'</span>,",
    "        <span class=\"text-green-300\">'Tailwind CSS'</span>,",
    "        <span class=\"text-green-300\">'JavaScript'</span>,",
    "        <span class=\"text-green-300\">'MySQL'</span>,",
    "        <span class=\"text-green-300\">'React'</span>,",
    "        <span class=\"text-green-300\">'Blade'</span>,",
    "        <span class=\"text-green-300\">'Docker'</span>,",
    "        <span class=\"text-green-300\">'jQuery'</span>,",
    "        <span class=\"text-green-300\">'Vite.js'</span>,",
    "        <span class=\"text-green-300\">'Vue.js'</span>,",
    "        <span class=\"text-green-300\">'WordPress'</span>",
    "    ];",
    "}",
    "",
    "<span class=\"text-blue-400\">const</span> <span class=\"text-pink-400\">skills</span> = <span class=\"text-yellow-300\">getAllSkills</span>();",
    "",
    "<span class=\"text-blue-400\">function</span> <span class=\"text-yellow-300\">showSkills</span>(skills) {",
    "    skills.<span class=\"text-pink-400\">forEach</span>((skill, i) => {",
    "        <span class=\"text-blue-400\">console</span>.log(<span class=\"text-green-300\">`Skill #${i+1}: ${skill}`</span>);",
    "    });",
    "}",
    "",
    "<span class=\"text-blue-400\">showSkills</span>(skills);",
    "",
    "<span class=\"text-blue-400\">async function</span> <span class=\"text-yellow-300\">fetchProjects</span>() {",
    "    <span class=\"text-blue-400\">try</span> {",
    "        <span class=\"text-blue-400\">const</span> response = <span class=\"text-blue-400\">await</span> fetch(<span class=\"text-green-300\">'/api/projects'</span>);",
    "        <span class=\"text-blue-400\">const</span> data = <span class=\"text-blue-400\">await</span> response.json();",
    "        <span class=\"text-blue-400\">return</span> data;",
    "    } <span class=\"text-blue-400\">catch</span> (error) {",
    "        <span class=\"text-blue-400\">console</span>.error(<span class=\"text-green-300\">'Failed to fetch projects:'</span>, error);",
    "        <span class=\"text-blue-400\">return</span> [];",
    "    }",
    "}",
    "",
    "<span class=\"text-blue-400\">fetchProjects</span>().then(projects => {",
    "    projects.<span class=\"text-pink-400\">forEach</span>(project => {",
    "        <span class=\"text-blue-400\">console</span>.log(<span class=\"text-green-300\">`Project: ${project.title}`</span>);",
    "    });",
    "});",
    "",
    "<span class=\"text-blue-400\">export default</span> {",
    "    <span class=\"text-pink-400\">name</span>: <span class=\"text-green-300\">'PortfolioHero'</span>,",
    "    <span class=\"text-pink-400\">data</span>() {",
    "        <span class=\"text-blue-400\">return</span> {",
    "            <span class=\"text-pink-400\">skills</span>: skills,",
    "            <span class=\"text-pink-400\">projects</span>: []",
    "        };",
    "    },",
    "    <span class=\"text-pink-400\">methods</span>: {",
    "        <span class=\"text-yellow-300\">greet</span>(name) {",
    "            <span class=\"text-blue-400\">return</span> <span class=\"text-green-300\">`Welcome, ${name}!`</span>;",
    "        },",
    "        <span class=\"text-yellow-300\">async fetchProjects</span>() {",
    "            <span class=\"text-blue-400\">this</span>.projects = <span class=\"text-blue-400\">await</span> fetchProjects();",
    "        }",
    "    },",
    "    <span class=\"text-pink-400\">mounted</span>() {",
    "        <span class=\"text-blue-400\">this</span>.fetchProjects();",
    "    }",
    "};",
    "",
    "<span class=\"text-blue-400\">// Utility function</span>",
    "<span class=\"text-blue-400\">function</span> <span class=\"text-yellow-300\">capitalize</span>(str) {",
    "    <span class=\"text-blue-400\">return</span> str.charAt(0).toUpperCase() + str.slice(1);",
    "}",
    "",
    "<span class=\"text-blue-400\">console</span>.log(<span class=\"text-green-300\">capitalize('portfolio')</span>);"
];

const typewriterBg = document.getElementById('typewriter-bg');
const cursorBg = document.getElementById('typewriter-cursor-bg');
let line = 0,
    char = 0,
    typing = true;
const breakPoint = 40; // Line index to break and scroll

function scrollTypewriterToBottom() {
    typewriterBg.scrollTop = typewriterBg.scrollHeight;
}

function resetTypewriter() {
    typewriterBg.innerHTML = '';
    line = 0;
    char = 0;
    typing = true;
    cursorBg.style.display = '';
}

function typeLine() {
    if (line >= codeLines.length) {
        typing = false;
        cursorBg.style.display = 'none';
        // After finishing, scroll to bottom and restart after a pause
        setTimeout(() => {
            typewriterBg.scrollTop = 0;
            resetTypewriter();
            setTimeout(typeLine, 500);
        }, 1200);
        return;
    }
    let currentLine = codeLines[line];
    let displayed = typewriterBg.innerHTML.split('\n');
    if (displayed.length < line + 1) {
        typewriterBg.innerHTML += '\n';
        displayed = typewriterBg.innerHTML.split('\n');
    }
    if (char < currentLine.length) {
        displayed[line] = (displayed[line] || '') + currentLine[char];
        typewriterBg.innerHTML = displayed.join('\n');
        char++;
        // Scroll at break point
        if (line === breakPoint && char === 1) {
            setTimeout(() => {
                scrollTypewriterToBottom();
                setTimeout(typeLine, 400);
            }, 0);
        } else {
            setTimeout(typeLine, 10 + Math.random() * 18);
        }
    } else {
        typewriterBg.innerHTML = displayed.join('\n') + '\n';
        // Scroll at break point after line is finished
        if (line === breakPoint) {
            setTimeout(() => {
                scrollTypewriterToBottom();
                setTimeout(() => {
                    line++;
                    char = 0;
                    typeLine();
                }, 400);
            }, 0);
        } else {
            line++;
            char = 0;
            setTimeout(typeLine, 120);
        }
    }
}
document.addEventListener('DOMContentLoaded', () => {
    typeLine();
});