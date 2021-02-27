function extractLinks()
{
    allLinks = document.getElementsByTagName('a');
    links = [];
    for(i = 0; i < allLinks.length; ++i)
    {
        if(allLinks[i].href.length != 0)
        {
            links.push(allLinks[i].href);
        }
    }
    return links;
}