function MenuBurger() {
    const buttonHam = useRef(null);
    const form = useRef(null);
    const [isOpened, setIsOpened] = useState(false);
    
    const handleClick = () => {
    setIsOpened(!isOpened);
    if (isOpened) {
    buttonHam.current.setAttribute('aria-expanded', 'false');
    form.current.style.marginLeft = "-200%";
    } else {
    buttonHam.current.setAttribute('aria-expanded', 'true');
    form.current.style.marginLeft = "0%";
    }
    };
    
    return (
    <>
    <button className="hm-button" ref={buttonHam} aria-expanded={isOpened} onClick={handleClick} />
    <div className="form-container" ref={form} />
    </>
    );
    }