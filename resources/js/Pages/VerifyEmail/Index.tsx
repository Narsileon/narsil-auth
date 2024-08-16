import { Link } from "@inertiajs/react";
import { useTranslationsStore } from "@narsil-ui/Stores/translationStore";
import Button from "@narsil-ui/Components/Button/Button";
import Section from "@narsil-ui/Components/Section/Section";
import SectionContent from "@narsil-ui/Components/Section/SectionContent";
import SectionFooter from "@narsil-ui/Components/Section/SectionFooter";
import SectionFullscreenToggle from "@narsil-ui/Components/Section/SectionFullscreenToggle";
import SectionHeader from "@narsil-ui/Components/Section/SectionHeader";
import SectionTitle from "@narsil-ui/Components/Section/SectionTitle";

interface Props {
	status: string;
}

const Index = ({ status }: Props) => {
	const { trans } = useTranslationsStore();

	const title = trans("Email validation");

	return (
		<Section>
			<SectionHeader>
				<SectionTitle>{title}</SectionTitle>
				<SectionFullscreenToggle />
			</SectionHeader>
			<SectionContent>
				<div>
					<span className='mr-1'>{trans("We have sent you the verification email.")}</span>
					<span>{trans("If you cannon find the email, please also check the spam folder.")}</span>
				</div>

				<div>{trans("If you have not received the email, please click on the button below.")}</div>

				{status ? <span className='text-positive font-medium'>{status}</span> : null}
			</SectionContent>
			<SectionFooter>
				<Button asChild={true}>
					<Link
						href={route("verification.send")}
						method='post'
					>
						{trans("Send again")}
					</Link>
				</Button>
			</SectionFooter>
		</Section>
	);
};

export default Index;
